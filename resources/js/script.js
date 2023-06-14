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

