<template>
    <div class="student" >
    <Ccard class = "info-display">
      <CCardHeader></CCardHeader>
      <CListGroup flush>
        <CCardGroupItem><p class = "text-display item-left">Login to your univeristy network in app</p> <img class="image-location img-right" src="../assets/log_in.jpg" alt=""></CCardGroupItem>
        <CCardGroupItem><p class = "text-display item-right" >Click to generate a link/QR code</p><img class="image-location img-left" src="../assets/log_in.jpg" alt=""></CCardGroupItem>
        <CCardGroupItem><p class = "text-display item-left">Share the link with a participating business</p><img class="image-location img-right" src="../assets/log_in.jpg" alt=""></CCardGroupItem>
      </CListGroup>
    </Ccard>
  </div>
  </template>
  
  <style>
  @media (min-width: 1024px) {

    .student {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: #FAFAFA;
    }
    .info-display{
        background-color: white;
        width: 70vh;
        height: 60vh;
        display: flex;
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
      bottom: 2vh;
    }

    .img-left{
      bottom: 5vh;
      left: 2vh;
    }

  }
  </style>

