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
      window.location.replace("https://m.certitude-demo.delta.games");
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
                <el-button class="bgradient" type="warning" @click="dialogVisible = true" round>I am a recruiter</el-button>
                <el-button class="bgradient" @click="studentClick" round>I am a Student</el-button>
              </div>
            </div>
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
              <h2>Contact Us!</h2>
              <el-form size="large" label-width="120px" class="demo-dynamic">
                <el-form-item prop="email" label="Email">
                  <el-input />
                </el-form-item>
                <el-form-item label="Message" prop="desc">
                  <el-input type="textarea" rows="15" />
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
    I guess copyright or something can go here<br />
    should also make this<br />
    taller<br />
    with links<br />
    and stuff
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

.container {
  max-width: 960px;
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

.secondary-content {
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: center;
}
</style>