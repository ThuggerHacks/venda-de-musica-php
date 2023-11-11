class NavMobile{
    constructor(menuCell,listaNav,navLinks){
        this.mobileMenu = document.querySelector(menuCell);
        this.navList = document.querySelector(listaNav);
        this.navLinks = document.querySelectorAll(navLinks);
        this.activeClass = "active";
        
        this.handleClick = this.handleClick.bind(this);
    }
    animarLinks(){
        this.navLinks.forEach((link,index) => {

            link.style.animation
            ?(link.style.animation = "") 
            :(link.style.animation = `navLinkFade 0.5s ease forwards ${index/7+0.3}s`);
        });
    }

    handleClick(){
        this.navList.classList.toggle(this.activeClass);
        this.mobileMenu.classList.toggle(this.activeClass);
        this.animarLinks();

    }

    addClickEvent(){
        this.mobileMenu.addEventListener("click", this.handleClick);
    }
    init(){
        if(this.mobileMenu){
            this.addClickEvent();
        }
        return this;
    }
}
const navMobile = new NavMobile(
    ".menuCell",
    ".lista-nav",
    ".lista-nav li",
)
navMobile.init();

