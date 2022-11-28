<script lang="ts">
import { defineComponent, computed } from 'vue';
import { firebaseStore } from './stores/firebase';
const loggedIn = computed(() => firebaseStore().loggedIn);
console.log(loggedIn);
export default defineComponent({
  name: 'App',
  data() {
    return {
      scrollPosition: null as unknown as number,
      hover:false,
      hover1:false, 
      hover2:false,
      hover3:false,
      hover4:false,
      hover5:false,
      mobile:false,
      mobileNav:false,
      windowWidth:1000,
      mobileButton:false,
    }
  },
  methods: {
    onClick(path: string) {

    },
    toggleMobileNav() {
      this.mobileNav = !this.mobileNav;
    },
    mobileButtonClick(){

    }
    ,
    checkScreenSize(){
      this.windowWidth = window.innerWidth;
      if(this.windowWidth <= 950){
        this.mobile = true;
       
      }else{
        this.mobile = false;
        this.mobileNav = false;
      }

      return;
    }
  },
  created(){
    window.addEventListener('resize',this.checkScreenSize);
    this.checkScreenSize();
  },
  mounted() {
    window.addEventListener('scroll', () => {
      this.scrollPosition = window.scrollY;
    });
  }
  
});
</script>

<template>
  <div class="p-relative">
    <nav :class="['navBar', 'fixed', {'bg': scrollPosition > 50}]">
    <div class="cert-logo">Certitude</div>
    <div class="rectangle"></div> 

      <div class="navBar-container">
        <ul v-show="!mobile" class="navBar-list">
          <li class="navBar-item">
            <div class="bar-holder"></div>
          </li>
          <li class="navBar-item" @mouseover="hover = true" @mouseleave="hover = false">
            <a href="/" class="navBar-link">Home</a>
          <Transition>
          <div v-if="hover" class="bar"></div>
          </Transition>
          </li>

          <li class="navBar-item" @mouseover="hover1 = true" @mouseleave="hover1 = false">
            <a href="/#about" class="navBar-link">About</a>
            <Transition>
            <div v-if="hover1" class="bar"></div>
          </Transition>
          </li>
          <li class="navBar-item" @mouseover="hover2 = true" @mouseleave="hover2 = false">
            <a href="/#contact" class="navBar-link">Contact</a>
            <Transition>
          <div v-if="hover2" class="bar"></div>
          </Transition>
          </li>
          <li class="navBar-item" @mouseover="hover3 = true" @mouseleave="hover3 = false">
            <a href="/student" class="navBar-link">Student</a>
            <Transition>
          <div v-if="hover3" class="bar"></div>
          </Transition>
          </li>
          <li class="navBar-item" @mouseover="hover4 = true" @mouseleave="hover4 = false" >
            <a href="/business" class="navBar-link">Business</a>
            <Transition>
          <div v-if="hover4" class="bar"></div>
          </Transition>
          </li>
          <li class="navBar-item" @mouseover="hover5 = true" @mouseleave="hover5 = false">
            <a href="/institution" class="navBar-link">Institution</a>
            <Transition>
          <div v-if="hover5" class="bar"></div>
          </Transition>
          </li>
        </ul>

        <div class="hamburger">
          <button @click="toggleMobileNav" v-show="mobile" class="nav-button"><el-icon :class="mobileNav ?'hamburger-active': 'hamburger-not-active'  "><Menu/></el-icon></button>
        </div>

        <Transition name="mobile-nav" >
          <ul v-show="mobileNav" :class="mobileNav ?'dropdown-nav': 'dropdown-nav-not-active'">
            <li class="navBar-item top-link">
              <div class="bar-holder"></div>
            </li>
            <li class="navBar-item" @mouseover="hover = true" @mouseleave="hover = false"  @click="toggleMobileNav">
              <a href="/" class="navBar-link">Home
              </a>
            <Transition>
            <div v-if="hover" class="bar"></div>
            </Transition>
            
            </li>
  
            <li class="navBar-item" @mouseover="hover1 = true" @mouseleave="hover1 = false"  @click="toggleMobileNav">
              <a href="/#about" class="navBar-link">About</a>
              <Transition>
              <div v-if="hover1" class="bar"></div>
            </Transition>
            </li>
            <li class="navBar-item" @mouseover="hover2 = true" @mouseleave="hover2 = false"  @click="toggleMobileNav">
              <a href="/#contact" class="navBar-link">Contact</a>
              <Transition>
            <div v-if="hover2" class="bar"></div>
            </Transition>
            </li>
            <li class="navBar-item" @mouseover="hover3 = true" @mouseleave="hover3 = false"  @click="toggleMobileNav">
              <a href="/student" class="navBar-link">Student</a>
              <Transition>
            <div v-if="hover3" class="bar"></div>
            </Transition>
            </li>
            <li class="navBar-item" @mouseover="hover4 = true" @mouseleave="hover4 = false"  @click="toggleMobileNav">
              <a href="/business" class="navBar-link">Business</a>
              <Transition>
            <div v-if="hover4" class="bar"></div>
            </Transition>
            </li>
            <li class="navBar-item" @mouseover="hover5 = true" @mouseleave="hover5 = false"  @click="toggleMobileNav">
              <a href="/institution" class="navBar-link">Institution</a>
              <Transition>
            <div v-if="hover5" class="bar"></div>
            </Transition>
            </li>
          </ul>
        </Transition>
      </div> 
    </nav>
  </div>

  <RouterView />
</template>

<style scoped>

nav{
  display: flex;
  flex-direction: row;
  transition: 0.5s ease all;
  @media (min-width:1140px){
    max-width:1140px
  } 
}

.dropdown-nav{
  display: flex;
  flex-direction: column;
  position: fixed;
  width: 100%;
  max-width: 250px;
  height: 100%;
  background-color: rgb(255, 255, 255);
  top:0;
  left:0;
  border-radius: 10px;
  animation: fade-in 1.1s ease-in;
}


.dropdown-nav-not-active{
  display: flex;
  flex-direction: column;
  position: fixed;
  width: 100%;
  max-width: 250px;
  height: 100%;
  background-color: rgb(255, 255, 255);
  top:0;
  left:0;
  border-radius: 10px;
  animation: fade-out 1s ease-out;
}

.top-link{
  margin-top: 20px;
}
.rectangle{
  position: absolute;
  width: 200px;
  height: 20px;
  margin-top: 42px;
  margin-left: 35px;
  z-index: 0;
  background: linear-gradient(90deg, rgb(255, 119, 0) 0%, rgba(252,181,49,1) 50%, rgba(254,209,50,1) 100%);
  z-index: 1;
  border-radius: 8px;
}

.cert-logo{
  z-index: 2;
  margin-top: 20px;
  font-family: 'Secular One';
  font-weight: bold;
}

.bg {
  color: black !important;
  background-color: rgb(255, 255, 255) !important;
  box-shadow: 0 0 10px rgb(255, 153, 0);
}
.bg > .navBar-link {
  color: inherit !important;
}
.navBar-link {
  color: inherit;
  text-decoration: none;
}

.nav-button{
  background: transparent;
  border: 0;
  width: 200px;
  height: 200px;
}
.bar{
  background: linear-gradient(90deg, rgb(255, 119, 0) 0%, rgba(252,181,49,1) 40%, rgba(254,209,50,1) 100%);
  margin-top: 3px;
  height: 6px;
  width:50px;
  position: fixed;
}
.bar-holder{
background: white;
  margin-top: 30px;
  height: 6px;
  width:50px;
  opacity: 0;
}
.hamburger{
  color:black;
  margin-right: 20px;
  font-size: 35px;
}

el-icon{
    cursor: pointer;
}

.hamburger-active{
  transition: .5s ease all;
  background: linear-gradient(90deg, rgb(255, 119, 0) 0%, rgba(252,181,49,1) 40%, rgba(254,209,50,1) 100%);
  transform: rotate(45deg);
}

.hamburger-not-active{
  transition: .5s ease all;
  background: transparent;
  transform: rotate(90deg);
}
.navBar-item {
  font-size: 16px;
  padding: .75em 15px;
  letter-spacing: 1px;
  position:static;
  font-weight: 700;
}

.navBar-list {
  display: flex;
  flex-direction: row;
  padding-left: 0;
  margin-bottom: 0;
  list-style: none;
}

.navBar-container {
  display: flex !important;
  flex-basis: auto;
  flex-grow: 1;
  align-items: center;
  justify-content: right;
}

.navBar {
  background-color: transparent;
  height: 94px;
  display: flex !important;
  transition: all .6s ease;
  color:white;
}


.v-enter-active,
.v-leave-active {
  transition: width 1s ease;
  width: 50px;
}

.v-enter-from,
.v-leave-to {
  width: 0px;
}


@keyframes fade-in {
  from {
    transform: translateX(-100%);
  }

  to {
    transform: translateX(3%);
  }
}

@keyframes fade-out {
  from {
    transform: translateX(3%);
  }

  to {
    transform: translateX(-100%);
  }
}




</style>
<!-- translateX(0%); -->