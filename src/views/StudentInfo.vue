<template>
    <div class="student" >
    <Ccard class = "info-display">
      <CCardHeader>Header</CCardHeader>
      <CListGroup flush>
        <CCardGroupItem><p class = "text-display">Login to your univeristy network in app</p> <img class="image-location" src="../assets/log_in.jpg" alt=""></CCardGroupItem>
        <CCardGroupItem><p>Click to generate a link/QR code</p></CCardGroupItem>
        <CCardGroupItem><p>Share the link with a participating business</p></CCardGroupItem>
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
        width: 60.47vh;
        height: 48.71vh;
        display: flex;
        align-items: center;
    }
    .text-display{
      position: relative;
      
    }
    .image-location{
      position: relative;
      width: 10vh;
      height: 10vh;
    }  
  
  }
  </style>

