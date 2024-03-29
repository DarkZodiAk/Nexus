document.addEventListener('click', e =>{
    const isDeleteButton = e.target.matches("[delete-msg]")
    if (!isDeleteButton && e.target.closest('[delete-msg]') != null) return
    let currentDelete

    if (isDeleteButton){
        currentDelete = e.target.closest('[delete-msg]')
        const confirmed = confirm("Вы точно хотите удалить данное сообщение?");
        if (confirmed) {
            const itemId = currentDelete.value;
            window.location.href = "logic/del_message.php?id=" + itemId;
        }
    }
})

document.addEventListener('click', e =>{
    const isDeleteButton = e.target.matches("[delete-topic]")
    if (!isDeleteButton && e.target.closest('[delete-topic]') != null) return
    let currentDelete

    if (isDeleteButton){
        currentDelete = e.target.closest('[delete-topic]')
        const confirmed = confirm("Вы точно хотите удалить данную тему?");
        if (confirmed) {
            const itemId = currentDelete.value;
            window.location.href = "logic/del_topic.php?id=" + itemId;
        }
    }
})