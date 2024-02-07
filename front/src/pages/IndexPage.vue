<template>
  <q-page>
    <l-map
      v-model:zoom="zoom"
      :center="[-17.965, -67.1125]"
      :use-global-leaflet="false"
      style="height: calc(100vh - 107px)"
      :min-zoom="12"
      @click="handleMapClick"
    >
      <l-tile-layer
        v-for="tileProvider in tileProviders"
        :key="tileProvider.name"
        :name="tileProvider.name"
        :visible="tileProvider.visible"
        :url="tileProvider.url"
        :attribution="tileProvider.attribution"
        layer-type="base"
      />
      <l-marker
        v-for="dancer in dancers"
        :lat-lng="[parseFloat(dancer.lat), parseFloat(dancer.lng)]"
        :key="dancer.id"
        @dragend="onDragEnd(dancer, $event)"
        :draggable="true"
        @click="showDance(dancer)"
        name="marker"
      >
        <l-icon
          :icon-anchor="[16, 37]"
          class-name="someExtraClass"
        >
          <div class="headline">
            {{ dancer.name }}
          </div>
          <img :src="`${url}../uploads/${dancer.imagen}`" style="width: 40px; height: 40px;" />
        </l-icon>
      </l-marker>
<!--      <l-marker-->
<!--        v-for="dancer in dancers"-->
<!--        :lat-lng="[-17.965, -67.1125]"-->
<!--        :key="dancer.id"-->
<!--        @dragend="onDragEnd(dancer, $event)"-->
<!--        :draggable="true"-->
<!--        @click="showDance(dancer)"-->
<!--        name="marker"-->
<!--      >-->
<!--      <l-icon-->
<!--        :icon-url="`${url}../uploads/${dancer.imagen}`"-->
<!--        :icon-size="[40, 40]"-->
<!--        :icon-anchor="[16, 40]"-->
<!--      >-->
<!--      </l-icon>-->
<!--      </l-marker>-->
      <l-control-layers
        position="topright"
        :collapsed="true"
        :sort-layers="true"
      />
      <l-polyline
        :lat-lngs="polyline.latlngs"
        :color="polyline.color"
        :opacity="polyline.opacity"
        :weight="polyline.weight"
      />
      <l-control position="topleft">
<!--        <q-toggle v-model="enviarDatos" label="Enviar datos" dense />-->
        <q-img src="logo.png" width="100px" />
        <br>
        <q-btn dense size="12px" label="Actualizar" color="primary" icon="refresh" @click="getDancers" :loading="loading" no-caps/>
      </l-control>
    </l-map>
    <q-dialog v-model="dialogDancer">
      <q-card class="q-pa-md">
        <q-card-section class="row items-center q-pa-none q-ma-none">
          <q-avatar size="50px">
            <img :src="'data:image/png;base64,' + dancer.image" />
          </q-avatar>
          <div class="q-ml-md">
            <div>{{ dancer.name }}</div>
          </div>
          <q-space/>
          <q-btn flat color="primary" icon="close" v-close-popup />
        </q-card-section>
        <q-card-section class="q-pa-none">
          <q-item>
            <q-item-section>
              <q-item-label>
                <iframe
                  width="100%"
                  height="200"
                  :src="`https://www.youtube.com/embed/${dancer.video}?`"
                  title="SPOT CARNAVAL DE ORURO 2024"
                  frameborder="0"
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                  allowfullscreen
                ></iframe>
                <div class="text-caption text-capitalize">
                  {{ dancer.description}}
                </div>
                <div class="row">
                  <div class="col-3 flex flex-center">
                    Velocidad:
                  </div>
                  <div class="col-3">
                    <q-input model-value="0" type="number" v-model="dancer.velocity" dense outlined @update:model-value="cambioVelocidad" />
                  </div>
                </div>
              </q-item-label>
            </q-item-section>
          </q-item>
        </q-card-section>
        <q-card-actions align="right">
          <q-btn flat color="primary" label="Cerrar" v-close-popup />
        </q-card-actions>
      </q-card>
    </q-dialog>
    <q-dialog v-model="dialogChangeDancer">
      <q-card class="q-pa-md">
        <q-card-section class="row items-center q-pa-none q-ma-none">
          <div class="q-ml-md">
            <div>Seleccionar bailarín</div>
          </div>
          <q-space/>
          <q-btn flat color="primary" icon="close" v-close-popup />
        </q-card-section>
        <q-card-section class="q-pa-none">
          <q-item>
            <q-item-section>
              <q-item-label>
                <q-select
                  v-model="dancerUpdate"
                  :options="dancers"
                  label="Bailarín"
                  dense outlined
                  emit-value
                  map-options
                  option-label="name"
                  option-value="id"
                />
<!--                <pre>{{dancer}}</pre>-->
              </q-item-label>
            </q-item-section>
          </q-item>
        </q-card-section>
        <q-card-actions align="right">
          <q-btn color="primary" label="Cambiar" @click="updateDancers" :loading="loading" />
          <q-btn flat color="primary" label="Cerrar" v-close-popup :loading="loading" />
        </q-card-actions>
      </q-card>
    </q-dialog>
  </q-page>
</template>

<script>
import 'leaflet/dist/leaflet.css'
import { LMap, LTileLayer, LControl, LControlLayers, LPolyline, LMarker, LIcon } from '@vue-leaflet/vue-leaflet'
import dataLine from 'src/pages/line.json'
import { io } from 'socket.io-client'
import { api, url, urlSocket } from 'boot/axios'
const tileProviders = [
  {
    name: 'Mapa',
    visible: true,
    url: 'https://mt1.google.com/vt/lyrs=r&x={x}&y={y}&z={z}',
    attribution: '&copy; Google Maps'
  },
  {
    name: 'Satelite',
    visible: false,
    url: 'https://mt1.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',
    attribution: '&copy; Google Maps'
  }
]
export default {
  components: {
    LIcon,
    LMap,
    LTileLayer,
    LControl,
    LControlLayers,
    LPolyline,
    LMarker
  },
  data () {
    return {
      socket: io(urlSocket),
      loading: false,
      tileProviders,
      visibleMap: true,
      zoom: 15,
      enviarDatos: false,
      url,
      dialogDancer: false,
      dialogChangeDancer: false,
      showDancer: true,
      dancers: [],
      dancer: {},
      dancerUpdate: '',
      latUpdate: 0,
      lngUpdate: 0,
      polyline: {
        opacity: 0.5,
        weight: 10,
        latlngs: dataLine,
        color: 'orange'
      },
      showDance (dancer) {
        this.dancer = dancer
        this.dialogDancer = true
      },
      // cambioVelocidad (value) {
      //   if (value < 0) {
      //     value = 1
      //   }
      //   console.log('cambioVelocidad', value)
      //   // this.socket.emit('cambioVelocidad', { id: this.dancer.id, velocity: value })
      // },
      onDragStart (dancer, event) {
        this.showDancer = false
        console.log('onDragStart', dancer)
      },
      onDragEnd (dancer, event) {
        api.post('dancersUpdate', { id: dancer.id, lat: event.target._latlng.lat, lng: event.target._latlng.lng }).then((res) => {
          console.log('res', res)
        })
        // this.showDancer = true
        // const marker = event.target
        // const position = marker.getLatLng()
        // console.log('onDragEnd', position)
        // this.socket.emit('cambioPosicion', { id: dancer.id, latitud: position.lat, longitud: position.lng })
      }
      // moveMarker (dancer) {
      //   const currentPosition = dancer.position
      //   console.log('currentPosition', currentPosition + 'dance', dancer.name)
      //   const nextLatLng = dataLine[currentPosition + 1]
      //   if (nextLatLng) {
      //     if (this.showDancer) {
      //       dancer.latitud = nextLatLng[0]
      //       dancer.longitud = nextLatLng[1]
      //     }
      //     dancer.position += 1
      //     // Llama a moveMarker recursivamente después de la duración calculada
      //     setTimeout(() => {
      //       this.moveMarker(dancer)
      //     }, (dancer.velocity) * 1000)
      //   } else {
      //     dancer.position = 0
      //     dancer.latitud = 0
      //     dancer.longitud = 0
      //     // this.moveMarker(dancer)
      //   }
      // }
    }
  },
  methods: {
    handleMapClick (event) {
      this.dancerUpdate = ''
      this.latUpdate = event.latlng.lat
      this.lngUpdate = event.latlng.lng
      this.dialogChangeDancer = true
    },
    async updateDancers () {
      if (this.dancerUpdate === '') {
        this.$q.notify({
          color: 'negative',
          position: 'top',
          message: 'Seleccione un bailarín',
          icon: 'report_problem'
        })
        return false
      }
      this.loading = await true
      await api.post('dancersUpdate', { id: this.dancerUpdate, lat: this.latUpdate, lng: this.lngUpdate }).then((res) => {
        // console.log('res', res)
        this.dialogChangeDancer = false
      }).finally(() => {
        this.loading = false
      })
    },
    getDancers () {
      this.loading = true
      api.get('dancers').then((res) => {
        this.dancers = res.data
      }).finally(() => {
        this.loading = false
      })
    }
  },
  async mounted () {
    this.getDancers()
    this.socket.on('dance', (data) => {
      console.log('data', data)
      data.forEach((dancer) => {
        const findDancer = this.dancers.find((d) => d.id === dancer.id)
        if (findDancer) {
          findDancer.lat = dancer.lat
          findDancer.lng = dancer.lng
        }
      })
    })
    // this.dancers.forEach((dancer) => {
    //   if (dancer.position !== 0) {
    //     this.moveMarker(dancer)
    //   }
    // })
  }
}
</script>
<style>
.someExtraClass {
  //background-color: aqua;
  //padding: 10px;
  //border: 1px solid #333;
  //border-radius: 0 20px 20px 20px;
  //box-shadow: 5px 3px 10px rgba(0, 0, 0, 0.2);
  text-align: center;
  width: auto !important;
  height: auto !important;
  //margin: 0 !important;
}
.headline {
  font-size: 0.8em;
  font-weight: bold;
  margin: 0;
  padding: 0;
  color: #000;
  width: 100px;
  line-height: 1em;
  background: rgba(255, 255, 255, 0.2);
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
  border-radius: 5px;
}
</style>
