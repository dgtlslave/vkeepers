const EventBus = new Vue({})

export default EventBus

// 1 создаю новый иью элемент в отдельном файле

//     const EventBus = new Vue({})

//     export default EventBus

// 2 в элементе который "говорит" регистрируем как EventBus.$emit('boxPos', this.position)
    
//     - 'boxPos' - куда говорят
//     - this.position - что говорят

//     givePosition(x){
//         this.position.push(x)
//         EventBus.$emit('boxPos', this.position)
//     }
// 3 в элементе который "слушает" в маунтед регистрируем как EventBus.$on('boxPos', (payload)=>{this.position = payload

//     - 'boxPos' что слушать
//     - payload переменная в которой храниться что говорят

//     mounted(){
//     EventBus.$on('boxPos', (payload)=>{
//         this.position = payload
//     })
 