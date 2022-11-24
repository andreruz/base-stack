<template>
    <div>
        <button class="bg-blue-500 shadow-md border-solid border-2 border-indigo-600" @click="count++">You clicked me {{ count }} times.</button>
    </div>
  
</template>

<script>
export default {
  data() {
    return {
      count: 0
    }
  }
}
</script>

