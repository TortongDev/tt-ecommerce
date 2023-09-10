// base-controller.js

const BaseControllers = {
    data() {
        return {
            detailStatus1: true,
            detailStatus2: false,
            detailStatus3: false,
            amount: '',
            price:'',
            total_price:'',
            value1:''
        }
    },
    methods: {
      
        showDetail(id) {
            if(id == 2){
                this.detailStatus1 = false
                this.detailStatus2 = true
                this.detailStatus3 = false
            }else if(id == 3){
                this.detailStatus1 = false
                this.detailStatus2 = false
                this.detailStatus3 = true
            }else{
                this.detailStatus1 = true
                this.detailStatus2 = false
                this.detailStatus3 = false
            }
        },
      btnSlide() {
        const menuSlideStyle = document.querySelector('.menu-slide');
          menuSlideStyle.style.width = '100%';
          menuSlideStyle.style.transition = '0.5s';
          
            if (this.menuSlide == 1) {
                menuSlideStyle.style.width = '1px';
                this.menuSlide = 0
            }else{
                this.menuSlide = 1
            }
      },input1(){
        console.log(1);
      }
        
    },mounted() {
      
    },
  }
  