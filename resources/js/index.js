// Url retrieval function
window.baseUrl = function(path) {
    let basePath = document.querySelector('meta[name="base-url"]').getAttribute('content');
    if (basePath[basePath.length-1] === '/') basePath = basePath.slice(0, basePath.length-1);
    if (path[0] === '/') path = path.slice(1);
    return basePath + '/' + path;
};

// Set events and http services on window
import events from "./services/events"
import httpInstance from "./services/http"
window.$http = httpInstance;
window.$events = events;

// Translation setup
// Creates a global function with name 'trans' to be used in the same way as Laravel's translation system
import Translations from "./services/translations"
const translator = new Translations();
window.trans = translator.get.bind(translator);
window.trans_choice = translator.getPlural.bind(translator);
window.trans_plural = translator.parsePlural.bind(translator);


// REVIEW FEATURE

  let data = {
    index: 0,
    attempts:0
  }

  const questions = document.getElementsByClassName('review')
  const question = document.getElementsByClassName('question')[0];
  const quiz = document.getElementById('quiz');
  let currentPage = data.index+1

  if(questions.length >= 1){
    question.innerHTML = "("+currentPage+"/"+questions.length+" )" + questions[data.index].dataset.question
    quiz.style.display = "block";
  }else{
    quiz.style.display = "none";
  }

function quizMe(){
  if(!questions[data.index]){data.index = 0;}
  quiz.style.background = "#98cef5";
  currentPage = data.index+1
  question.innerHTML = "("+currentPage+"/"+questions.length+" )" + questions[data.index].dataset.question
}

function skip(){
    const answered = document.getElementsByClassName('answered')[0];
    questions[data.index].style.background = "inherit";
    data.index++;
    answered.value = ""
    data.attempts = 0;
    quizMe();
}

function score(){
  const answered = document.getElementsByClassName('answered')[0];
  const ans = questions[data.index].dataset.answer.split(',').map((a)=>{return a.toLowerCase().trim();})

  if(ans.includes(answered.value.toLowerCase().trim())){
      quiz.style.background = "#5aff67";
      questions[data.index].scrollIntoView();
      questions[data.index].style.background = "#5aff67";
      setTimeout(() => {
        questions[data.index].style.background = "inherit";
        data.index++;
        answered.value = ""
        data.attempts = 0;
        quizMe();
    }, 3000);
     
    }else{
      

      if(data.attempts >= 3){
        questions[data.index].scrollIntoView();
        questions[data.index].style.background = "#81d8ff";
        answered.value = questions[data.index].dataset.answer.split(",")[0]
      }else{
        data.attempts++;
      }
       quiz.style.background = "#ff8989";
       question.innerHTML = questions[data.index].dataset.question + " (attempts: "+data.attempts+")"
    }
}

// Load Components
import components from "./components"
components();