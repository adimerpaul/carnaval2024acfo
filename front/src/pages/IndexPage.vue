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
        layer-type="base"
        :attribution="''"
      />
      <template v-if="$store.isLogin">
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
            class-name="someExtraClass"
          >
            <img
              :src="`data:image/png;base64,${dancer.image}`"
              style="width: 40px; height: 40px;"
            />
            <div class="headline">
              {{ dancer.name }}
            </div>
          </l-icon>
        </l-marker>
      </template>
      <template v-else>
        <l-marker
          v-for="dancer in dancers"
          :lat-lng="[parseFloat(dancer.lat), parseFloat(dancer.lng)]"
          :key="dancer.id"
          @click="showDance(dancer)"
          name="marker"
        >
          <l-icon
            class-name="someExtraClass"
          >
            <img
              :src="`data:image/png;base64,${dancer.image}`"
              style="width: 40px; height: 40px;"
            />
            <div class="headline">
              {{ dancer.name }}
            </div>
          </l-icon>
        </l-marker>
      </template>
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
        <div style="width: 100px; height: 100px; border-radius: 5px; background: #02052F; display: inline-block;">
          <q-img src="logoCentral.png" width="100px" style="border-radius: 5px;" />
        </div>
        <br>
        <br>
        <q-btn class="q-pm-xs" dense size="16px" label="Actualizar" color="positive" icon="refresh" @click="getDancers" :loading="loading" no-caps/>
        <br>
        <br>
        <q-btn dense :disable="true" size="12px" :label="`Vistas ${cog}`" color="primary" icon="visibility" no-caps/>
      </l-control>
      <l-control position="topright">
        <div>Compartir</div>
        <ShareNetwork
          v-for="network in networks"
          :network="network.network"
          :key="network.network"
          :style="{backgroundColor: network.color}"
          :url="sharing.url"
          :title="sharing.title"
          :description="sharing.description"
          :quote="sharing.quote"
          :hashtags="sharing.hashtags"
          :twitterUser="sharing.twitterUser"
        >
          <q-btn  size="xs" :icon="network.icon" :color="network.color" />
          <br>
        </ShareNetwork>
      </l-control>
    </l-map>
    <q-dialog v-model="dialogDancer">
      <q-card class="q-pa-md">
        <q-card-section class="row items-center q-pa-none q-ma-none">
          <q-avatar size="40px">
            <img :src="'data:image/png;base64,' + dancer.image" />
          </q-avatar>
          <q-space/>
          <q-btn flat color="primary" icon="close" v-close-popup />
        </q-card-section>
        <q-card-section class="q-pa-none">
          <q-item>
            <q-item-section>
              <div class="q-ml-md text-subtitle1 text-center" >
                <div>{{ dancer.name }}</div>
              </div>
              <q-item-label>
                <iframe width="100%" height="500" :src="`https://www.youtube.com/embed/${dancer.video}`" title="PRIMER CONVITE Rumbo al CARNAVAL de ORURO 2025 (1/2)" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                <div class="text-caption text-capitalize">
                  {{ dancer.history}}
                </div>
              </q-item-label>
            </q-item-section>
          </q-item>
        </q-card-section>
        <q-card-actions align="right">
          <q-btn flat :loading="loading" color="red" label="Ocultar" @click="dancepocition0(dancer)" v-if="$store.isLogin" />
          <q-btn flat :loading="loading" color="primary" label="Cerrar" v-close-popup />
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
                  @filter="filterFn"
                  use-input
                  input-debounce="0"
                />
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
import 'leaflet-arrowheads'
import 'leaflet-polylineoffset'
import { LMap, LTileLayer, LControl, LControlLayers, LPolyline, LMarker, LIcon } from '@vue-leaflet/vue-leaflet'
import dataLine from 'src/pages/morenadaNoche.json'
import { io } from 'socket.io-client'
import { api, url, urlSocket } from 'boot/axios'

const tileProviders = [
  {
    name: 'Mapa',
    visible: true,
    url: 'https://mt1.google.com/vt/lyrs=r&x={x}&y={y}&z={z}',
    attribution: '&copy Google Maps'
  },
  {
    name: 'Satelite',
    visible: false,
    url: 'https://mt1.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',
    attribution: '&copy Google Maps'
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
      dancerAll: [],
      dancer: {},
      dancerUpdate: '',
      latUpdate: 0,
      lngUpdate: 0,
      polyline: {
        opacity: 0.8,
        weight: 6,
        latlngs: [],
        color: '#D8392B',
        offset: 2
      },
      cog: 0,
      sharing: {
        url: 'https://www.centenariocentral.com/',
        title: 'Ruta del Carnaval de Oruro 2025',
        description: 'Vive la experiencia del Carnaval de Oruro 2025',
        quote: 'Vive la experiencia del Carnaval de Oruro 2025',
        hashtags: 'Ruta,Carnaval,Oruro',
        twitterUser: 'adimer'
      },
      networks: [
        { network: 'email', name: 'Email', icon: 'far fah fa-lg fa-envelope', color: '#d02727' },
        { network: 'facebook', name: 'Facebook', icon: 'fab fah fa-lg fa-facebook-f', color: '#1877f2' },
        { network: 'skype', name: 'Skype', icon: 'fab fah fa-lg fa-skype', color: '#00aff0' },
        { network: 'sms', name: 'SMS', icon: 'far fah fa-lg fa-comment-dots', color: '#333333' },
        { network: 'telegram', name: 'Telegram', icon: 'fab fah fa-lg fa-telegram-plane', color: '#0088cc' },
        { network: 'twitter', name: 'Twitter', icon: 'fab fah fa-lg fa-twitter', color: '#1da1f2' },
        { network: 'whatsapp', name: 'Whatsapp', icon: 'fab fah fa-lg fa-whatsapp', color: '#25d366' }
      ],
      locations: []
    }
  },
  mounted () {
    this.postCog()
    this.getDancers()
    if (this.$store.swSocket) {
      this.socket.on('dance', (data) => {
        this.postCog()
        data.forEach((dancer) => {
          const findDancer = this.dancers.find((d) => d.id === dancer.id)
          if (findDancer) {
            findDancer.lat = dancer.lat
            findDancer.lng = dancer.lng
          }
        })
      })
      this.$store.swSocket = false
    }
    this.lineasGet()
  },
  methods: {
    lineasGet () {
      api.get('lineas').then((res) => {
        this.polyline.latlngs = res.data
      })
    },
    filterFn (val, update) {
      if (val === '') {
        update(() => {
          this.dancers = this.dancerAll
        })
        return
      }
      const needle = val.toLowerCase()
      update(() => {
        this.dancers = this.dancerAll.filter((v) => v.name.toLowerCase().indexOf(needle) > -1)
      })
    },
    showDance (dancer) {
      this.dancer = dancer
      this.dialogDancer = true
    },
    onDragEnd (dancer, event) {
      this.loading = true
      api.post('dancersUpdate', { id: dancer.id, lat: event.target._latlng.lat, lng: event.target._latlng.lng }).then((res) => {
        console.log('res', res)
      }).finally(() => {
        this.loading = false
      })
    },
    handleMapClick (event) {
      if (!this.$store.isLogin) {
        return false
      }
      this.dancerUpdate = ''
      this.latUpdate = event.latlng.lat
      this.lngUpdate = event.latlng.lng
      this.dialogChangeDancer = true
    },
    dancepocition0 (dancer) {
      this.loading = true
      api.post('dancersUpdate', { id: dancer.id, lat: 0, lng: 0 }).then(() => {
        this.dialogDancer = false
      }).finally(() => {
        this.loading = false
      })
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
      await api.post('dancersUpdate', { id: this.dancerUpdate, lat: this.latUpdate, lng: this.lngUpdate }).then(() => {
        this.dialogChangeDancer = false
      }).finally(() => {
        this.loading = false
      })
    },
    getDancers () {
      this.loading = true
      this.$axios.get('dancers').then((res) => {
        this.dancers = res.data
        this.dancerAll = res.data
        this.getCogs()
      }).finally(() => {
        this.loading = false
      }).catch((error) => {
        this.$q.notify({
          color: 'negative',
          position: 'top',
          message: error.response.data.message,
          icon: 'report_problem'
        })
      })
    },
    getCogs () {
      api.get('cogs').then((res) => {
        this.cog = res.data.value
      })
    },
    postCog () {
      this.$axios.post('cogs').then((res) => {
        this.cog = res.data.value
        this.getCogs()
      })
    }
  }
}
</script>

<style>
.someExtraClass {
  text-align: center;
}
.headline {
  font-size: 0.8em;
  font-weight: bold;
  margin: 0;
  padding: 0;
  color: #000;
  width: 100px;
  line-height: 1em;
  background: rgba(255,152,0, 0.6);
  box-shadow: 0 0 5px rgba(255,152,0, 0.3);
  border-radius: 5px;
}
.leaflet-control-attribution {
  display: none !important;
}
</style>
