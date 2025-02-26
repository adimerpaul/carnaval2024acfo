<template>
  <q-page class="q-pa-md flex flex-center my-q-page">
    <div class="column items-center text-center">
      <!-- Imagen principal -->
      <q-img src="https://avatars.githubusercontent.com/u/22999010?v=4" width="150px" class="q-mb-md" style="border-radius: 50%;" />

      <!-- Nombre y título -->
      <div class="text-h4 text-bold text-primary">Ing. Adimer Paul Chambi Ajata</div>
      <div class="text-subtitle1 text-grey-7">Desarrollador de Software & Ingeniero</div>

      <!-- Descripción sobre ti -->
      <div class="q-mt-md q-px-md text-justify" style="max-width: 600px;">
        <p>
          Soy un apasionado desarrollador de software con experiencia en múltiples tecnologías.
          Me especializo en la creación de soluciones innovadoras, eficientes y escalables.
          Mi enfoque principal es la calidad del código y la experiencia del usuario.
        </p>
        <p>
          Tengo experiencia en <strong>Laravel, NestJS, MySQL</strong>, y desarrollo de sistemas completos.
          Además, disfruto contribuyendo en comunidades de código abierto y explorando nuevas tecnologías.
        </p>
      </div>

      <!-- Redes Sociales -->
      <div class="q-mt-lg row justify-center q-gutter-md">
        <q-btn round flat color="blue" icon="fab fa-github" @click="goTo('https://github.com/adimerpaul')" />
        <q-btn round flat color="blue" icon="fab fa-gitlab" @click="goTo('https://gitlab.com/adimerpaul')" />
        <q-btn round flat color="blue" icon="fab fa-whatsapp" @click="goTo('https://wa.me/59169603027')" />
        <q-btn round flat color="blue" icon="fab fa-linkedin" @click="goTo('https://www.linkedin.com/in/adimerchambi/')" />
        <q-btn round flat color="blue" icon="fab fa-facebook" @click="goTo('https://www.facebook.com/adimer.paul')" />
      </div>
    </div>
  </q-page>
</template>

<script>
export default {
  name: 'AboutDeveloper',
  methods: {
    goTo (url) {
      window.open(url, '_blank')
    }
  }
}
</script>
<style>
.my-q-page {
  background: linear-gradient(to right, #1e3c72, #2a5298);
  color: white;
}
</style>
