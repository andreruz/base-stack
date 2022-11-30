<template>
  <div>

    <h1 class="mb-8 text-3xl font-bold">
      <a class="text-indigo-400 hover:text-indigo-600" href="/padlock">Padlocks</a>
      <span class="text-indigo-400 font-medium">/</span>
      {{ form.name }} - {{ form.description }}
    </h1>

    <div class="max-w-3xl bg-white rounded-md shadow overflow-hidden">
      <form @submit.prevent="update">
        <div class="flex flex-wrap -mb-8 -mr-6 p-8 flex-col">

          <label for="name" class="mt-4">Name:</label>
          <input type="text" id="name" v-model="form.name" :error="form.errors.name" label="Name" />

          <label for="padlock_type" class="mt-4">Type:</label>
          <select id="padlock_type" v-model="form.padlock_type_id"  class="pb-8 pr-6 w-full lg:w-1/2" label="Type">
              <option :value="null" />
              <option v-for="padlock_type in padlock_types" :key="padlock_type.id" :value="padlock_type.id">{{ padlock_type.name }}</option>
          </select>

          <label for="price" class="mt-4">Price:</label>
          <input type="text" id="price" v-model="form.price" :error="form.errors.price" label="Price" />
          
          <label for="qty" class="mt-4">Quantity:</label>
          <input type="text" id="qty" v-model="form.qty" :error="form.errors.qty" label="Quantity" />
          
        </div>
        <div class="flex items-center px-8 py-4 bg-gray-50 border-t border-gray-100">
          <button v-if="!padlock.deleted_at" class="text-red-600 hover:underline" tabindex="-1" type="button" @click="destroy">Delete Padlock</button>
          <button type="submit" class="btn-indigo ml-auto text-green-700">Update Padlock</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3'

export default {
    components: {
    Head,
    Link,

  },
  props: {
    padlock: Object,
    padlock_types: Array,
    
  },
  remember: 'form',
    data() {
        return {
            form: this.$inertia.form({
            name: this.padlock.name,
            price: this.padlock.price,
            qty: this.padlock.qty,
            padlock_type_id: this.padlock.padlock_type_id,
            }),
        }
    },
    methods: {
        update() {
            this.form.put(`/padlock/${this.padlock.id}`)
        },
        destroy() {
            if (confirm('Are you sure you want to delete this padlock?')) {
            this.$inertia.delete(`/padlock/${this.padlock.id}`)
            }
        },
        restore() {
            if (confirm('Are you sure you want to restore this padlock?')) {
            this.$inertia.put(`/padlock/${this.padlock.id}/restore`)
            }
        },
    },
}
</script>

<style>

</style>