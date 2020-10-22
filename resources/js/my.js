window.onload = function(){

    const buttons = document.querySelectorAll('.toggle');
    const delete_btn = document.querySelectorAll('.delete');
    const modal_win = document.querySelector('#confirm');
    buttons.forEach((item) => {
        if(item.textContent == ' Да '){
            item.classList.toggle('btn-warning');
        }else{
            item.classList.toggle('btn-success');
        }
        item.addEventListener('click', () => {
            fetch('/user/toggle/' + item.getAttribute('data-id'), {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json;charset=utf-8',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                body: JSON.stringify({"id" : item.getAttribute('data-id')})
            })
            .then((response) => {
                return response.json();
            })
            .then((result) => {
                if(result.result == 1){
                    item.textContent = 'Да';
                    item.classList.toggle('btn-success');
                    item.classList.toggle('btn-warning');
                }else{
                    item.textContent = 'Нет';
                    item.classList.toggle('btn-warning');
                    item.classList.toggle('btn-success');
                }
            })
        })
    })
    
}   


