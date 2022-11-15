<template>
  <p class = "logo"><span class = "logo1">Cert</span><span class = "logo2">itude</span></p>
    <div class="student">
    <Ccard class = "info-display">
      <CCardHeader class = "header">How it Works</CCardHeader>
      <CListGroup>
        <CCardGroupItem><p class = "text-display item-left">Login to your univeristy network in app</p> <img class="image-location img-right" src="@/assets/student_info_pic1.jpg" alt=""></CCardGroupItem>
        <CCardGroupItem><p class = "text-display item-right" >Click to generate a link/QR code</p><img class="image-location img-left" src="@/assets/student_info_pic2.png" alt=""></CCardGroupItem>
        <CCardGroupItem><p class = "text-display item-left">Share the link with a participating business</p><img class="image-location img-right" src="@/assets/student_info_pic3.jpg" alt=""></CCardGroupItem>
      </CListGroup>
    </Ccard>
  </div>
  <img class="man-standing" src="@/assets/lawyer_standin.png" alt="">
    <el-footer class="footer" height="300">
      <div>
      <p>educertified@gmail.com</p>
  <img class = "socials" src="@/assets/linkedin_logo.png" alt="">
  <img class = "socials" src="@/assets/instagram_logo.png" alt="">
</div>
  </el-footer>
  </template>
  
  <style>
  @media (min-width: 1024px) {
    
    .socials{
      width: 5vh;
      margin-left: auto;
    }

    .logo{
      font-weight: bolder;
      font-size: 2rem;
      background: darkslategray;;
      padding: 0%;
      margin: 0%;
    }

    .logo1{
      color: #65CC4C;
    }
    .logo2{
      color: #161616;
    }
    .man-standing{
      position: absolute;
      right: 40vh;
      bottom: 10vh;
      width: 40vh;
    }

    .header{
      text-align: center;
      font-weight: bold;
      font-size: large;
      position: relative;
      left: 25vh;
    }

    .student {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: #D3D3D3;
    }
    .info-display{
        background-color: white;
        width: 70vh;
        height: 60vh;
        align-items: center;
    }
    .text-display{
      position: relative;
      
    }
    .image-location{
      position: relative;
      width: 14vh;
      height: 14vh;
    }

    .item-left{
      top: 5vh;
      font-size: large;
      font-weight: bolder;
    }
    .item-right{
      left: 30vh;
      top: 5vh;    
      font-size: large;
      font-weight: bolder;
    }
    .img-right{
      left: 50vh;
      bottom: 5vh;
    }

    .img-left{
      bottom: 5vh;
      left: 2vh;
    }

  }
  .footer {
  background: darkslategray;
  padding: 1em;
  color: white;
  text-align: center;
  margin-bottom: 0;
}

  </style>

