<template>
  <q-page class="q-pa-md">
    <div class="text-right">
      <q-btn
        color="primary"
        label="Actualizar"
        no-caps
        :loading="loading"
        @click="getUsers"
      />
    </div>
    <q-markup-table dense :wrap-cells="true" separator="cell">
      <thead>
        <tr>
          <th>Id</th>
          <th>Name</th>
          <th>Nickname</th>
          <th>Time</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="user in users" :key="user.id">
          <td>{{ user.id }}</td>
          <td>{{ user.name }}</td>
          <td>{{ user.nickname }}</td>
          <td class="text-center">
            <q-chip
              :label="user.time"
              text-color="white"
              :color="user.time < 50 ? 'green' : (user.time <100 ? 'warning' : 'negative')"
            />
          </td>
        </tr>
      </tbody>
    </q-markup-table>
  </q-page>
</template>
<script>
import { api } from 'boot/axios'
export default {
  name: 'VideosPage',
  data () {
    return {
      users: [],
      loading: false
    }
  },
  mounted () {
    this.getUsers()
  },
  methods: {
    async getUsers () {
      this.loading = true
      const response = await api.get('/users')
      this.loading = false
      this.users = response.data
    }
  }
}
</script>
