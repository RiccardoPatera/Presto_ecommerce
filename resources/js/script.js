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

// Cattura elementi logout
let logout = document.querySelector('#logout');
let delete_article = document.querySelector('#delete');

if (logout) {
    logout.addEventListener('click', (event)=>{
        event.preventDefault();
        let logoutForm = document.querySelector('#logoutForm');
        logoutForm.submit();
    });
}

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



    // Cattura elementi Homepage

    let ourvision=document.querySelector('#ourvision');
    let ourvision_point=document.querySelector('#ourv-obs-point');
    let logo=document.querySelector('#logo');
    let container_home=document.querySelector('#container-home');
    let slogan=document.querySelector('#slogan');
    let slogan2=document.querySelector('#slogan2');

    let step1=document.querySelector('#step1');
    let step2=document.querySelector('#step2');
    let step3=document.querySelector('#step3');
    let point1=document.querySelector('#point1');
    let point2=document.querySelector('#point2');
    let point3=document.querySelector('#point3');


    // Intersection Observer Homepage
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

            let observer3= new IntersectionObserver((entries) =>
            {
                entries.forEach(entry =>{
                    if (entry.isIntersecting)
                    {
                        step1.classList.remove('opacity-0');
                        step1.classList.add('appare');
                    }
                });
            })

            let observer4= new IntersectionObserver((entries) =>
            {
                entries.forEach(entry =>{
                    if (entry.isIntersecting)
                    {
                        step2.classList.remove('opacity-0');
                        step2.classList.add('apparesx');
                    }
                });
            })


            let observer5= new IntersectionObserver((entries) =>
            {
                entries.forEach(entry =>{
                    if (entry.isIntersecting)
                    {
                        step3.classList.remove('opacity-0');
                        step3.classList.add('appare');
                    }
                });
            })



// Observer Homepage

 observer.observe(ourvision);
 observer2.observe(container_home)
 observer3.observe(point1);
 observer4.observe(point2);
 observer5.observe(point3);

