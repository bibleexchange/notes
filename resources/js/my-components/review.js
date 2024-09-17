class Review {
    constructor() {
        this.data = {
            index: 0,
            attempts:0
        }

      this.questions = document.getElementsByClassName('review')
      this.question = document.getElementsByClassName('question')[0];
      this.quizEl = document.getElementById('quiz');  
      this.skipEl = document.getElementById("skip")
      this.scoreEl = document.getElementById("score")
      this.answered = document.getElementsByClassName('answered')[0];    }

    render(){
      if(!this.quizEl){return null}
      this.skipEl && this.skipEl.addEventListener('click', this.skip.bind(this))
      this.scoreEl && this.scoreEl.addEventListener('click', this.score.bind(this))

      let currentPage = this.data.index+1

      if(this.questions.length >= 1){
        this.question.innerHTML = "("+currentPage+"/"+this.questions.length+" )" + this.questions[this.data.index].dataset.question
        this.quizEl.style.display = "block";
      }else{
        this.quizEl.style.display = "none";
      }
    }

    quizMe(){
      if(!this.questions[this.data.index]){this.data.index = 0;}
      this.quizEl.style.background = "#98cef5";
      let currentPage = this.data.index+1
      this.question.innerHTML = "("+currentPage+"/"+this.questions.length+" )" + this.questions[this.data.index].dataset.question
    }

    skip(){
        console.log("skip pressed")
        if(this.questions[this.data.index]){
            this.questions[this.data.index].style.background = "inherit";
        }
        this.data.index++;
        this.answered.value = ""
        this.data.attempts = 0;
        this.quizMe();
    }

  score(){
    console.log("score pressed")
  const ans = this.questions[this.data.index].dataset.answer.split(',').map((a)=>{return a.toLowerCase().trim();})

  if(ans.includes(this.answered.value.toLowerCase().trim())){
      this.quizEl.style.background = "#5aff67";
      this.questions[this.data.index].scrollIntoView();
      this.questions[this.data.index].style.background = "#5aff67";

      let questions = this.questions
      let data = this.data
      let answered = this.answered
      let quizMe = this.quizMe

      setTimeout(() => {
        questions[data.index].style.background = "inherit";
        data.index++;
        answered.value = ""
        data.attempts = 0;
        quizMe();
    }, 3000);
     
    }else{
      

      if(this.data.attempts >= 3){
        this.questions[this.data.index].scrollIntoView();
        this.questions[this.data.index].style.background = "#81d8ff";
        this.answered.value = this.questions[this.data.index].dataset.answer.split(",")[0]
      }else{
        this.data.attempts++;
      }
       this.quizEl.style.background = "#ff8989";
       this.question.innerHTML = this.questions[this.data.index].dataset.question + " (attempts: "+this.data.attempts+")"
    }
}
}

export default Review;