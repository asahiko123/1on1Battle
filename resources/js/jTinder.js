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
        var buildResultForm = async function(){

            var result = await new Promise((resolve, reject) => {
                var res = response.text();
                resolve(res);
            });

            const candyList = JSON.parse(result);

            let keyArray = Object.keys(candyList);

            keyArray.forEach((el) => {
                let element = candyList[el];

                if(element !== null){

                    element.forEach((obj) => {
                        console.log(obj['name']);

                        let li = document.createElement('li');
                        let maker = document.createElement('p');
                        li.textContent = obj['name'];
                        maker.textContent = obj['maker'];
                        let ul = document.querySelector('ul.recommend');
                        ul.appendChild(li);
                        li.appendChild(maker);
                    })

                }

            })

        }

        buildResultForm();

    })

}


$("#tinderslide").jTinder({
    onDislike: function(item){
        currentQuestionIndex++;
        storeToSessionStorage('dislike',myCallback);
        checkQuestionNum();

    },
    onLike: function(item){
        currentQuestionIndex++;
        storeToSessionStorage('like',myCallback);
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



function storeToSessionStorage(status,currentQuestionStatement){

        const category = currentQuestionStatement(tasteList);
        const dataList = [];

        console.log('データ追加')

        let sessionData = {
            status : status
        }

        sessionStorage.setItem(category,JSON.stringify(sessionData));
        postReaction(category,status);

}


var myCallback = function(){

    let elList;

    const statement = document.getElementsByClassName('userName');

    console.log(statement);

    const currentQuestionStatement = statement.item(questionsNum-currentQuestionIndex);

    console.log(questionsNum);
    console.log(currentQuestionIndex);
    console.log(currentQuestionStatement.innerHTML);
    console.log(tasteList);


    tasteList.forEach(el => {

        if(currentQuestionStatement.innerHTML.includes(el)){
            console.log(el);
            elList = el;
        }

    });

    console.log(elList);
    return elList;

}




