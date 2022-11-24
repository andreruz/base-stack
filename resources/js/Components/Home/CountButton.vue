<script>
export default {
  data() {
    return {
      count: 0
    }
  }
}
</script>

<template>
  <button class="bg-blue-500 shadow-md border-solid border-2 border-indigo-600" @click="count++">You clicked me {{ count }} times.</button>
</template>