<script setup lang="ts">

</script>

<template>
  <header class="headSplash p-relative">
    <div class="particles">
      <img src="@/assets/particles_blurred.png" alt="spinning particles" class="animation-image" />
    </div>
    <div class="container">
      <el-row>
        <el-col>
          <div class="wrapper p-relative">
            <div class="content">
              <h1>Certitude is Seamless</h1>
              <p>
                Our revolutionary education verification
                platform is simple, instant, and secure
              </p>
              <div class="buttons">
                <el-button class="bgradient" type="warning" round>I am a recruiter</el-button>
                <el-button class="bgradient" round>I am a Student</el-button>
              </div>
            </div>
          </div>
        </el-col>
      </el-row>
    </div>
  </header>
</template>

<style scoped>
.container {
  max-width:960px;
  width: 100%;
  padding-right: 15px;
  padding-left: 15px;
  margin-right: auto;
  margin-left: auto;
}

.headSplash {
  background-image: url('@/assets/splashbanner.jpg');
  background-size: cover;
  background-repeat: no-repeat;
  background-position: 50%;
  overflow: hidden;
}

.particles {
  position: absolute;
  left: 10%;
}

.animation-image {
  width: 30vw;
  animation: spin 20s linear infinite;
}

@keyframes spin {
  from {
    transform: rotate(0deg);
  }

  to {
    transform: rotate(360deg);
  }
}

.content {
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: center;
  width: 40%;
}
</style>