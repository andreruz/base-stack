<template>
  <div>
    <h1 class="mb-8 text-3xl font-bold">
      <a class="text-indigo-400 hover:text-indigo-600" href="/padlock-type">Types</a>
      <span class="text-indigo-400 font-medium">/</span> Create
    </h1>
    <div class="max-w-3xl bg-white rounded-md shadow">

      <form @submit.prevent="store" class="flex flex-col">
        <label for="name" class="mt-4">Name:</label>
        <input type="text" id="name" v-model="form.name" />
        <label for="description" class="mt-4">Description:</label>
        <input type="text" id="description" v-model="form.description" />
        <label for="max_chars" class="mt-4">Max chars:</label>
        <input type="text" id="max_chars" v-model="form.max_chars" />
        <button type="submit" class="h-12 my-4 border-1 bg-green-700 text-white font-bold text-xl">Create</button>
      </form>
    </div>
  </div>
    
  </template>
  
  <script>
  import { reactive } from 'vue'
  import { Inertia } from '@inertiajs/inertia'
  
  export default {
    remember: 'form',
    data() {
        return {
          form: this.$inertia.form({
            name: '',
            description: '',
            max_chars: '',
          }),
        }
    },
    methods: {
      store() {
        this.form.post('/padlock-type')
      }
    },
  }
  </script>