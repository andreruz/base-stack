<template>
    <div>
        <a class="h-12 p-2 text-blue-800 font-bold text-xl" href="/dashboard">
          <p>Home</p>
        </a>

        <h1 class="mb-8 text-3xl font-bold">Types</h1>
        
        <a class="h-12 bg-blue-700 p-2 text-white font-bold text-xl" href="/dashboard">
          <span>Home</span>
        </a>

        <a class="h-12 bg-blue-700 p-2 text-white font-bold text-xl" href="/padlock-type/create">
          <span>Create Type</span>
        </a>

        <div class="bg-white rounded-md shadow overflow-x-auto">
            <table class="w-full whitespace-nowrap">
                <tr class="text-left font-bold">
                <th class="pb-4 pt-6 px-6">Name</th>
                <th class="pb-4 pt-6 px-6">Description</th>
                <th class="pb-4 pt-6 px-6">Max chars</th>
                </tr>
                <tr v-for="padlock_type in padlock_types" :key="padlock_type.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
                <td class="border-t">
                    <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="`/padlock-type/${padlock_type.id}/edit`">
                    {{ padlock_type.name }}
                    
                    </Link>
                </td>
                <td class="border-t">
                    <Link class="flex items-center px-6 py-4" :href="`/padlock-type/${padlock_type.id}/edit`" tabindex="-1">
                    <div v-if="padlock_type.description">
                        {{ padlock_type.description }}
                    </div>
                    </Link>
                </td>
                <td class="border-t">
                    <Link class="flex items-center px-6 py-4" :href="`/padlock-type/${padlock_type.id}/edit`" tabindex="-1">
                    {{ padlock_type.max_chars }}
                    </Link>
                </td>
                <td class="w-px border-t">
                    <Link class="flex items-center px-4" :href="`/padlock-type/${padlock_type.id}/edit`" tabindex="-1">
                    
                    </Link>
                </td>
                </tr>
                
            </table>
        </div>
    </div>
</template>

<script>
 import { Head, Link } from '@inertiajs/inertia-vue3'

 import pickBy from 'lodash/pickBy'
 import throttle from 'lodash/throttle'
 import mapValues from 'lodash/mapValues'

export default {
  components: {
     Head,
     Link,

  },
  props: {
    filters: Object,
    padlock_types: Object,
  },
  data() {
    return {
      form: {

      },
    }
  },
  watch: {
    form: {
      deep: true,
      handler: throttle(function () {
        this.$inertia.get('/type', pickBy(this.form), { preserveState: true })
      }, 150),
    },
  },
  methods: {
    reset() {
      this.form = mapValues(this.form, () => null)
    },
  },
}
</script>

