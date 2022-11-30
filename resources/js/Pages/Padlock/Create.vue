<template>
  <div>
    <h1 class="mb-8 text-3xl font-bold">
      <a class="text-indigo-400 hover:text-indigo-600" href="/padlock">Padlocks</a>
      <span class="text-indigo-400 font-medium">/</span> Create
    </h1>
    <div class="max-w-3xl bg-white rounded-md shadow overflow-hidden">

      <form @submit.prevent="store" class="flex flex-col">
        <label for="name" class="mt-4">Name:</label>
        <input type="text" id="name" v-model="form.name" />

        <label for="padlock_type" class="mt-4">Type:</label>
        <select id="padlock_type" v-model="form.padlock_type_id"  class="pb-8 pr-6 w-full lg:w-1/2" label="Type">
            <option :value="null" />
            <option v-for="padlock_type in padlock_types" :key="padlock_type.id" :value="padlock_type.id">{{ padlock_type.name }}</option>
        </select>

        <label for="price" class="mt-4">Price:</label>
        <input type="text" id="price" v-model="form.price" />
        <label for="qty" class="mt-4">Qty:</label>
        <input type="text" id="qty" v-model="form.qty" />
        <button type="submit" class="h-12 my-4 border-1 bg-green-700 text-white font-bold text-xl">Create</button>
      </form>
    </div>
  </div>
    
  </template>
  
  <script>
  import { reactive } from 'vue'
  import { Inertia } from '@inertiajs/inertia'
  
  export default {
    props: {
      padlock_types: Array,
    
    },

    remember: 'form',
    data() {
        return {
          form: this.$inertia.form({
            name: '',
            price: '',
            qty: '',
            padlock_type_id: null,
          }),
        }
    },
    methods: {
      store() {
        this.form.post('/padlock')
      }
    },
  }
  </script>