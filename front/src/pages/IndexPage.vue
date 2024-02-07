<template>
  <q-page>
    <l-map v-model:zoom="zoom" :center="[-17.969000, -67.112000]" :use-global-leaflet="false" style="height: calc(100vh - 107px)" :min-zoom="12">
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
        :lat-lng="[dancer.latitud, dancer.longitud]"
        style="background: red"
        :key="dancer.id"
        @dragend="onDragEnd(dancer, $event)"
        @dragstart="onDragStart(dancer, $event)"
        :draggable="true"
        @click="showDance(dancer)"
      >
        <l-icon
          :icon-url="'data:image/png;base64,' + dancer.image"
          :icon-size="[40, 40]"
          :icon-anchor="[16, 40]"
        />
      </l-marker>
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
        <q-img src="http://localhost:9000/logo.png" width="100px" />
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
  </q-page>
</template>

<script>
import 'leaflet/dist/leaflet.css'
import { LMap, LTileLayer, LControl, LControlLayers, LPolyline, LMarker, LIcon } from '@vue-leaflet/vue-leaflet'
import dataLine from 'src/pages/line.json'
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
import { io } from 'socket.io-client'
import { api, url, urlSocket } from 'boot/axios'
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
      tileProviders,
      visibleMap: true,
      zoom: 15,
      enviarDatos: false,
      url,
      dialogDancer: false,
      showDancer: true,
      dancers: [],
      dancer: {},
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
      cambioVelocidad (value) {
        if (value < 0) {
          value = 1
        }
        console.log('cambioVelocidad', value)
        // this.socket.emit('cambioVelocidad', { id: this.dancer.id, velocity: value })
      },
      onDragStart (dancer, event) {
        this.showDancer = false
        console.log('onDragStart', dancer)
      },
      onDragEnd (dancer, event) {
        this.showDancer = true
        const marker = event.target
        const position = marker.getLatLng()
        console.log('onDragEnd', position)
        this.socket.emit('cambioPosicion', { id: dancer.id, latitud: position.lat, longitud: position.lng })
      },
      moveMarker (dancer) {
        const currentPosition = dancer.position
        console.log('currentPosition', currentPosition + 'dance', dancer.name)
        const nextLatLng = dataLine[currentPosition + 1]
        if (nextLatLng) {
          if (this.showDancer) {
            dancer.latitud = nextLatLng[0]
            dancer.longitud = nextLatLng[1]
          }
          dancer.position += 1
          // Llama a moveMarker recursivamente después de la duración calculada
          setTimeout(() => {
            this.moveMarker(dancer)
          }, (dancer.velocity) * 1000)
        } else {
          dancer.position = 0
          dancer.latitud = 0
          dancer.longitud = 0
          // this.moveMarker(dancer)
        }
      }
    }
  },
  async mounted () {
    await api.get('dancers').then((res) => {
      this.dancers = res.data
    })
    this.dancers.forEach((dancer) => {
      if (dancer.position !== 0) {
        this.moveMarker(dancer)
      }
    })
  }
}
</script>
