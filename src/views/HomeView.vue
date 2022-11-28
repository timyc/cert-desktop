<script lang="ts">
import { defineComponent } from 'vue';
import { ElMessageBox } from 'element-plus';
import FirebaseAuth from '@/components/FirebaseAuth.vue'
export default defineComponent({
  name: 'App',
  data() {
    return {
      scrollPosition: null as unknown as number,
      dialogVisible: false,
    }
  },
  components: {FirebaseAuth},
  methods: {
    studentClick() {
      window.location.replace("https://cert-tawny.vercel.app/");
    },
    handleClose(done: () => void) {
      ElMessageBox.confirm('Are you sure to close this dialog?')
        .then(() => {
          done()
        })
        .catch(() => {
          // catch error
        })
    },
  },
});
</script>

<template>
  <header class="headSplash p-relative" id="home">
    <!-- <div class="particles">
      <img src="@/assets/particles_blurred.png" alt="spinning particles" class="animation-image" />
    </div> -->
    <div class="container">
      <el-row>
        <el-col>
          <div class="wrapper p-relative overall-content">
            <div class="content text-cert">
              <h1 class="text-wrapper">Certitude is <span class="seam">Seamless</span> </h1>
              <p class="intro-text">
                Our revolutionary education verification
                platform is <br/>simple, instant, and secure
              </p>
              <div class="buttons">
                <!-- <el-button class="bgradient" type="warning" @click="dialogVisible = true" round>I am a recruiter</el-button>
                
                <el-button class="bgradient" @click="studentClick" round>I am a Student</el-button> -->
                
                <button class="student-btn" @click="studentClick">Student<el-icon><CircleCheckFilled /></el-icon></button>
                <br/>
                <button class="recruiter" @click="dialogVisible = true">Recruiter <el-icon><Avatar /></el-icon></button>
                <br/>

                <!-- <button class="student">I am a Student <el-icon><Notebook /></el-icon></button> -->
              </div>
            </div>
            
            <img class="worker" src="@/assets/workers.png"/>
              <el-card class=" card-box">
                <div class="card-horizontal">
                <div class="text center item">
                  <el-icon :size="30" color="#fcb531" class="icon-grad">
                    <Pointer />
                  </el-icon>
                  <h2>One-Click Check</h2>
                  <p>
                    Students send credentials instantly through a secure link
                  </p>
                </div>
                <div class="vertical-bar"></div>
                <div class="text center item">
                  <el-icon :size="30" color="#fcb531" class="icon-grad">
                    <SetUp />
                  </el-icon>
                  <h2>Data Belongs to Students</h2>
                  <p>
                    Business won't share data on signup and only see what you send
                  </p>
                </div>
              </div>
              </el-card>
            
          </div>
        </el-col>
      </el-row>
    </div>
  </header>
  <el-row id="about">
    <div class="container">
      <el-row>
        <el-col :span="12">
          <div class="wrapper p-relative">

            <div class="secondary-content">
              <el-card class="box-card center">
                <div class="text item">
                  <el-icon :size="30" color="#ff7315" class="no-inherit">
                    <Pointer />
                  </el-icon>
                  <h2>One-Click Check</h2>
                  <p>
                    Students send credentials instantly through a secure link
                  </p>
                </div>
                <el-divider>
                  <el-icon>
                    <star-filled />
                  </el-icon>
                </el-divider>
                <div class="text item">
                  <el-icon :size="30" color="#ff7315" class="no-inherit">
                    <SetUp />
                  </el-icon>
                  <h2>Data Belongs to Students</h2>
                  <p>
                    Business won't share data on signup and only see what you send
                  </p>
                </div>
              </el-card>
            </div>


            
          </div>
        </el-col>
        <el-col :span="12" style="padding-left:50px">
          <div class="wrapper p-relative">
            <div class="secondary-content">
              <h1>About Us</h1>
              <p>
                We are a team of students and professionals who are passionate about education and technology. We
                believe that education is the key to a better future and that technology can help us achieve that
                future. We are building a platform that will help students and businesses connect and verify each
                other's credentials in a seamless and secure way.
              </p>
            </div>
          </div>
        </el-col>
      </el-row>
    </div>
  </el-row>
  <el-row id="contact">
    <div class="container">
      <el-row>
        <el-col :span="24">
          <div class="wrapper p-relative">
            <div class="secondary-content">

              <h1 class ="contact-us">Contact Us!</h1>
              <el-form size="large" label-width="120px" class="demo-dynamic contact-form">
                <el-form-item prop="email" label="Email" class="email-area">
                  <el-input />
                </el-form-item>
                <el-form-item label="Message" prop="desc" class="message-area">
                  <el-input type="textarea" rows="8" />
                </el-form-item>
                <el-form-item>
                  <el-button type="primary">Submit</el-button>
                </el-form-item>
              </el-form>

            </div>
          </div>
        </el-col>
      </el-row>
    </div>
  </el-row>
  <el-footer class="footer" height="300">
    Certitude © 2022 Made by Tim Chen, Jeffery Hover, Jason Nguyen, Ben Mueller 
  </el-footer>
  <el-dialog v-model="dialogVisible" title="Employer Auth" width="30%" :before-close="handleClose">
    <FirebaseAuth />
    <template #footer>
      <span class="dialog-footer">
        <el-button @click="dialogVisible = false">Cancel</el-button>
        <el-button type="primary" @click="dialogVisible = false">
          Confirm
        </el-button>
      </span>
    </template>
  </el-dialog>
</template>

<style scoped>
.footer {
  background: darkslategray;
  padding: 1em;
  color: white;
  text-align: center;
}

.about-img{
  width:800px;
  height: 400px;
}
.container {
  max-width: 1350px;
  width: 100%;
  overflow-x: hidden;
  overflow-y: hidden;
}

.about-us{
  margin-top: 70px;
  font-size: 45px;
}
.subtitle{

font-family: 'Archivo Black';
font-size: 17px;
overflow-x: hidden;
}
.no-inherit{
font-family: 'Comfortaa' !important;
margin-top:10px;
font-size: 15px;
color: rgb(161, 161, 161);
}
.headSplash {
  background-image: url('@/assets/certitude_bg.png');
  background-size: cover;
  background-repeat: no-repeat;
  background-position: 50%;
  overflow: hidden;
}


.coo-spacing{
margin-left: -100px;

}

.cto-spacing{
  margin-left: -100px;

  }



.seam{
  background: linear-gradient(81deg, rgba(255,106,0,1) 0%,  rgba(255,209,0,1) 20%,rgba(255,241,78,1) 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: black;
  -webkit-text-stroke: 10px transparent;
  padding-left: 3px;
  padding-right:2px;
  background-size: 400%;
 
}
.seam:hover{
  animation: bg-animation 10s infinite alternate; 
}

.intro-text{
  margin-top: 10px;
}


.coo-img{
width: 100px;
height: 100px;
border-radius: 60%;
}
.cto-img{
  width: 100px;
  height: 100px;
  padding-bottom: 3px;
  border-radius: 60%;
}



.icon-grad{
  background: linear-gradient(90deg, rgb(255, 119, 0) 0%, rgba(252,181,49,1) 50%, rgba(254,209,50,1) 100%);
  -webkit-background-clip: text;
  background-clip: text;
  -webkit-text-fill-color: transparent;
}
.student-btn{
  border: 3px;
  width: 160px;
  height: 60px;
  font-family:'Archivo Black';
  font-size: 20px;
  color: black;
  border-radius: 5px;
  margin-top: 20px;
  background: linear-gradient(90deg, rgb(255, 119, 0) 0%, rgba(252,181,49,1) 50%, rgba(254,209,50,1) 100%);
  box-shadow: 10px 10px 0px 1px rgb(0, 0, 0);
  border: 3px solid black;
  transition: transform 250ms;
}

.student-btn:hover{
  transform: translateX(10px);
}
.card-horizontal{
  display: flex;
  flex-direction: row;
  justify-content: space-between;
}


.particles {
  position: absolute;
  left: 10%;
}

.animation-image {
  width: 30vw;
  animation: spin 20s linear infinite;
}

@keyframes bg-animation {
  0%{
    background-position: left;
  }
  100%{
    background-position: right;
  }
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
  width: 100%;
  margin-right: 200px;
}

.vertical-bar{
  border-left: 3px solid rgb(61, 61, 61);
  margin-top: 40px;
  margin-left: 20px;
  margin-right: 20px;
  height: 100px;
}

.overall-content {
  height: 100%;
  display: flex;
  flex-direction: row;
  justify-content: start;
  width: 100%;
  margin-top: 200px;
}

.secondary-content {
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: center;
}
.text-cert{
  margin-top: -250px;
  margin-left: 70px;
  margin-right:-200px;
}
</style>