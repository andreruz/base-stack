<template>
  <div>

    <h1 class="mb-8 text-3xl font-bold">
      <a class="text-indigo-400 hover:text-indigo-600" href="/padlock-type">Types</a>
      <span class="text-indigo-400 font-medium">/</span>
      {{ form.name }} - {{ form.description }}
    </h1>

    <div class="max-w-3xl bg-white rounded-md shadow overflow-hidden">
      <form @submit.prevent="update">
        <div class="flex flex-wrap -mb-8 -mr-6 p-8 flex-col">

          <label for="name" class="mt-4">Name:</label>
          <input type="text" id="name" v-model="form.name" :error="form.errors.name" label="Name" />

          <label for="description" class="mt-4">Description:</label>
          <input type="text" id="description" v-model="form.description" :error="form.errors.description" label="Description" />
          
          <label for="max_chars" class="mt-4">Max chars:</label>
          <input type="text" id="max_chars" v-model="form.max_chars" :error="form.errors.max_chars" label="Max chars" />
          
        </div>
        <div class="flex items-center px-8 py-4 bg-gray-50 border-t border-gray-100">
          <button v-if="!padlock_type.deleted_at" class="text-red-600 hover:underline" tabindex="-1" type="button" @click="destroy">Delete Type</button>
          <button type="submit" class="btn-indigo ml-auto text-green-700">Update Type</button>
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
    padlock_type: Object,
    
  },
  remember: 'form',
    data() {
        return {
            form: this.$inertia.form({
            name: this.padlock_type.name,
            description: this.padlock_type.description,
            max_chars: this.padlock_type.max_chars,
            }),
        }
    },
    methods: {
        update() {
            this.form.put(`/padlock-type/${this.padlock_type.id}`)
        },
        destroy() {
            if (confirm('Are you sure you want to delete this type?')) {
            this.$inertia.delete(`/padlock-type/${this.padlock_type.id}`)
            }
        },
        restore() {
            if (confirm('Are you sure you want to restore this type?')) {
            this.$inertia.put(`/padlock-type/${this.padlock_type.id}/restore`)
            }
        },
    },
}
</script>

<style>

</style>