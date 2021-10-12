let menu = document.getElementById('toggle-menu')
let sidebar = document.querySelector('.sidebar');
let main = document.querySelector('.main')
let header= document.querySelector('.header')
//Modal
const topbar = document.getElementById('top-bar')
const contentUser = document.getElementById('options')
const editUser = document.getElementById('edit')
const deleteUser = document.getElementById('delete')
const viewUser = document.getElementById('view')
const modal = document.getElementById('modal')

menu.addEventListener('click',()=>{
    sidebar.classList.toggle('active');
    main.classList.toggle('active')
    header.classList.toggle('active')
    console.log("holaaa");
})

// if(contentUser){
//     contentUser.addEventListener('click',(e)=>{
//         console.log(e);
//     })
// }
topbar.addEventListener('click',(e)=>{
    if(e.target.classList.contains('fa-plus')){
        modal.classList.toggle('lightBox--show')
    }
})
contentUser.addEventListener('click',(e)=>{
    if(e.target.classList.contains('fa-pen')){
        modal.classList.toggle('lightBox--show')
    }else if(e.target.classList.contains('fa-trash')){
        modal.classList.toggle('lightBox--show')
    }else if(e.target.classList.contains('fa-eye')){
        modal.classList.toggle('lightBox--show')
    }
})
modal.addEventListener('click',(e)=>{
    if(e.target.classList.contains('lightBox')){
        modal.classList.toggle('lightBox--show')
    }
})
