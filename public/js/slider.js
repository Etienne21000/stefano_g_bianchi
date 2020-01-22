class Slider {
    constructor(banner, slider, nbSlide, slide, index){
        this.banner = document.querySelector(banner);
        this.slider = document.querySelector(slider);
        this.nbSlide = document.querySelectorAll(nbSlide).length-1;
        this.slide = document.querySelectorAll(slide);
        this.index = index;
        this.timer;
    };

    init(){
        this.slideShow();
        document.addEventListener("keydown", this.slideClavier.bind(this));
    };

    suivSlide(){

        if(this.index < this.nbSlide){
            this.index++;
        }
        else if(this.index === this.nbSlide){
            this.index = 0;
        }

        this.slide.forEach(function (s) {
            s.style.transform = 'translateX(-'+ this.index + '00%)';
        }.bind(this));

    };

    precSlide(){
        if(this.index > 0){
            this.index--;
        }
        else if(this.index === 0)
        {
            this.index = this.nbSlide;
        }

        this.slide.forEach(function(s){
            s.style.transform = 'translateX(-'+ this.index + '00%)';
        }.bind(this));
    };

    slideShow(){
        clearTimeout(this.timer);
        this.timer = setTimeout(function() {
            this.suivSlide();

            this.slide.forEach(function (s) {
                s.style.transform = 'translateX(-'+ this.index + '00%)';
            }.bind(this));

            this.slideShow();

        }.bind(this), 5000);
    };

    slideClavier(e) {
        if(e.keyCode === 39){
            this.suivSlide();
        }
        else if(e.keyCode === 37){
            this.precSlide();
        }
    };
};
