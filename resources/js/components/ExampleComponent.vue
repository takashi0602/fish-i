<template>
    <div class="mb-4">
        <h3 class="mb-4">商品ラインナップ</h3>
        <div class="d-flex justify-content-around bg-light py-4">
            <i :class="left_arrow" class="fas fa-arrow-circle-left align-self-center arrow-icon" @click="back()"></i>
            <div id="vue-carousel" class="vue-carousel">
                <transition :name="transition_name">
                    <img class="vue-carousel_img"
                         :key="index"
                         v-for="(image, index) in images"
                         v-if="visible_image == index"
                         :src="image.url">
                </transition>
            </div>
            <i :class="right_arrow" class="fas fa-arrow-circle-right align-self-center arrow-icon" @click="next()"></i>
        </div>
    </div>
</template>

<script>
export default {
  data() {
    return {
      images: [{
        url: '/storage/image1.jpg'
      },{
        url: '/storage/image2.jpg'
      },{
        url: '/storage/image3.jpg'
      },{
        url: '/storage/image4.jpg'
      },{
        url: '/storage/image5.jpg'
      }],
      transition_name: 'show-next',
      visible_image: 0,
      left_arrow: 'invisible',
      right_arrow: 'visible'
    }
  },
  methods: {
    back(){
      this.transition_name = 'show-prev';
      this.visible_image--;
      if(this.visible_image === 0) {
        this.left_arrow = 'invisible'
        this.right_arrow = 'visible'
      } else {
        this.left_arrow = 'visible'
        this.right_arrow = 'visible'
      }
    },
    next(){
      this.transition_name = 'show-next';
      this.visible_image++;
      if(this.visible_image === this.images.length - 1) {
        this.left_arrow = 'visible'
        this.right_arrow = 'invisible'
      } else {
        this.left_arrow = 'visible'
        this.right_arrow = 'visible'
      }
    }
  }
}
</script>

<style lang="scss">
.arrow-icon {
    font-size: 35px;
    cursor: pointer;
    color: #a8a9aa;
    @media screen and (min-width: 768px){
        font-size: 70px;
    }
}
.vue-carousel {
    height: 200px;
    width: 200px;
    overflow: hidden;
    position: relative;
    @media screen and (min-width: 768px){
        height: 300px;
        width: 300px;
    }
    &_img {
        height: 200px;
        position: absolute;
        top: 0;
        width: 100%;
        @media screen and (min-width: 768px){
            height: 300px;
        }
    }
}

.show-next-enter-active, .show-next-leave-active,
.show-prev-enter-active, .show-prev-leave-active  {
    transition: all .5s;
}
.show-next-enter, .show-prev-leave-to {
    transform: translateX(100%);
}
.show-next-leave-to, .show-prev-enter {
    transform: translateX(-100%);
}
</style>