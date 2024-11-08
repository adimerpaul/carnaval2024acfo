<template>
  <q-page>
        <q-carousel
          v-model="slide"
          transition-prev="slide-right"
          transition-next="slide-left"
          animated
          control-color="primary"
          class="rounded-borders"
        >
          <q-carousel-slide name="style" class="column no-wrap flex-center">
            <q-icon name="style" color="primary" size="56px" />
            <div class="q-mt-md text-center">
              <iframe width="100%" height="500" src="https://youtu.be/dblF0_foX7E" title="SPOT CARNAVAL DE ORURO 2024" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
          </q-carousel-slide>
          <q-carousel-slide name="tv" class="column no-wrap flex-center">
            <q-icon name="live_tv" color="primary" size="56px" />
            <div class="q-mt-md text-center">
              <iframe width="100%" height="500" src="https://youtu.be/K9kLnXB0WQM" title="ULTIMOS RECORRIDOS Rumbo al CARNAVAL de ORURO 2024 🇧🇴" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
          </q-carousel-slide>
          <q-carousel-slide name="layers" class="column no-wrap flex-center">
            <q-icon name="layers" color="primary" size="56px" />
            <div class="q-mt-md text-center">
              <iframe width="100%" height="500" src="https://youtu.be/BILiE7bqFe8" title="GRAN DEMOSTRACIÓN COREOGRAFICO - 5 DIABLADAS DE ORURO Y LANZAMIENTO DEL CARNAVAL DE ORURO 2024" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
          </q-carousel-slide>
        </q-carousel>

        <div class="row justify-center">
          <q-btn-toggle
            glossy
            v-model="slide"
            :options="[
              { label: 1, value: 'style' },
              { label: 2, value: 'tv' },
              { label: 3, value: 'layers' },
              // { label: 4, value: 'map' }
            ]"
          />
        </div>
  </q-page>
</template>
<script>
export default {
  name: 'VideosPage',
  data () {
    return {
      slide: 'style',
      lorem: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
    }
  }
}
</script>
