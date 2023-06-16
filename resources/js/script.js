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


let logout = document.querySelector('#logout');
    logout.addEventListener('click', (event)=>{
        event.preventDefault();
        let logoutForm = document.querySelector('#logoutForm');
        logoutForm.submit();
    });

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

    // let swiper2 = new Swiper('.swiper-revisor', {
    //     scrollbar: '.swiper-scrollbar',
    //     effect: 'coverflow',
    //     direction: 'vertical',
    //     loop: false,
    //     slideToClickedSlide: true,
    //     grabCursor: true,
    //     centeredSlides: true,
    //     slidesPerView: 'auto',
    //     coverflowEffect: {
    //       rotate: -5,
    //       stretch: 270,
    //       depth: 100,
    //       modifier: 1,
    //       slideShadows: false
    //     },
    //     freeMode:false,
    //     freeModeSticky:true
    //   });



    // Add event listeners

    let ourvision=document.querySelector('#ourvision');
    let ourvision_point=document.querySelector('#ourv-obs-point');
    let logo=document.querySelector('#logo');
    let container_home=document.querySelector('#container-home');
    let slogan=document.querySelector('#slogan');
    let slogan2=document.querySelector('#slogan2');


    let observer= new IntersectionObserver((entries) =>
            {
                entries.forEach(entry =>{
                    if (entry.isIntersecting)
                    {
                        ourvision.classList.add('down-to-up');
                        ourvision.classList.remove('opacity-0');
                    }
                });
            })

            let observer2= new IntersectionObserver((entries) =>
            {
                entries.forEach(entry =>{
                    if (entry.isIntersecting)
                    {
                        container_home.classList.remove('opacity-0');
                        logo.classList.add('down-to-up');
                        slogan2.classList.add('appare');
                        slogan.classList.add('opacity');
                    }
                });
            })


 observer.observe(ourvision);
 observer2.observe(container_home)
