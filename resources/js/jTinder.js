sessionStorage.clear();
let currentQuestionIndex = 0;

let postReaction = function(category,reaction){
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),

        }
    });

    $.ajax({
        type:"POST",
        url:"api/search",
        data: {
            category: category,
            status: reaction
        },
       
    }).then(
        // function(j_data){
        //     console.log('success');
        // }

        fetch('api/search')
        .then((response) => {
            // console.log(response.text());
            const responseText = response.text();
            const session = document.getElementById('session');
            session.innerText = responseText;
        })
    )
}

// let getReaction = function(){
//     fetch("/index",{
//         method:"GET",
//     }).then(response => {
//         console.log(response.status);
//     })
// }



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




