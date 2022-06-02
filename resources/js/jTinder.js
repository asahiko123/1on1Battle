import { makeHTMLComponentsByJs,getLandingImage, removeClassList ,addClassList } from "./module";

window.addEventListener("DOMContentLoaded",function() {
    const loader = document.getElementById('loader');
    loader.classList.add('loaded');
});

sessionStorage.clear();
let currentQuestionIndex = 0;

let postReaction = function(category,reaction){

    fetch('api/search',{
        method:"POST",
        url:"api/search",
        body: JSON.stringify({
            category: category,
            status: reaction
        }),
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Content-Type': 'application/json'
          },
    })
    .then((response) => {

        removeClassList();

        var buildResultForm = async function(){

            var result = await new Promise((resolve, reject) => {
                var res = response.text();
                resolve(res);
            });

            const candyList = JSON.parse(result);

            let keyArray = Object.keys(candyList);

            keyArray.forEach((el) => {
                let element = candyList[el];
                console.log(element);

                makeHTMLComponentsByJs(element);

                element.forEach((val) => {
                    let temp = val.url;
                    let name = val.name;
                    getLandingImage(temp,name);

                })
            })

        }

        buildResultForm();


    })

}


$("#tinderslide").jTinder({
    onDislike: function(item){
        currentQuestionIndex++;
        storeToSessionStorage('dislike',makeCandyTag);
        checkQuestionNum();

    },
    onLike: function(item){
        currentQuestionIndex++;
        storeToSessionStorage('like',makeCandyTag);
        checkQuestionNum();

    }
});
$('.actions .like, .actions .dislike').click(function(e){
    e.preventDefault();
    $("#tinderslide").jTinder($(this).attr('class'));
});

function checkQuestionNum(){
    if(currentQuestionIndex === questionsNum){

        $("#tinderslide").css('display','none');
        $("#resultForm").css('display','block');

        // getReaction();
    }
}



function storeToSessionStorage(status,fn){

        const category = fn();
        const dataList = [];

        console.log('データ追加')

        let sessionData = {
            status : status
        }

        sessionStorage.setItem(category,JSON.stringify(sessionData));
        postReaction(category,status);

}


var makeCandyTag = function(){

    let elList;

    const statement = document.getElementsByClassName('userName');

    // console.log(statement);

    const currentQuestionStatement = statement.item(questionsNum-currentQuestionIndex);

    // console.log(questionsNum);
    // console.log(currentQuestionIndex);
    // console.log(currentQuestionStatement.innerHTML);
    // console.log(tasteList);


    tasteList.forEach(el => {

        if(currentQuestionStatement.innerHTML.includes(el)){
            console.log(el);
            elList = el;
        }

    });

    console.log(elList);
    return elList;

}




