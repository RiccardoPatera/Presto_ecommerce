// let categorysearch=document.querySelector('.category-search');

// window.addEventListener('scroll',()=>{
//         if (window.scrollY>45) {
//            categorysearch.classList.add('categoryfixed');
//         }
//         else{
//             categorysearch.classList.remove('categoryfixed');
//         }

//         })


// let open_modal = document.querySelector("#open-modal");
// let modal=document.querySelector("#modal");
// open_modal.addEventListener('click',()=>{
//     modal.style.display = "block";
// })


// Swiper Js
    let swiper = new Swiper(".mySwiper", {
      effect: "coverflow",
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: "auto",
      coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: true,
      },
      pagination: {
        el: ".swiper-pagination",
      },
    });

    let swiper2 = new Swiper('.swiper-revisor', {
        scrollbar: '.swiper-scrollbar',
        effect: 'coverflow',
        direction: 'vertical',
        loop: false,
        slideToClickedSlide: true,
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: 'auto',
        coverflowEffect: {
          rotate: -5,
          stretch: 270,
          depth: 100,
          modifier: 1,
          slideShadows: false
        },
        freeMode:false,
        freeModeSticky:true
      });



    // let swiper2 = new Swiper(".mySwiper-revisor", {
    //     cssMode: true,
    //     navigation: {
    //       nextEl: ".swiper-button-next-revisor",
    //       prevEl: ".swiper-button-prev-revisor",
    //     },
    //     pagination: {
    //       el: ".swiper-pagination-revisor",
    //     },
    //     mousewheel: true,
    //     keyboard: true,
    //   });
