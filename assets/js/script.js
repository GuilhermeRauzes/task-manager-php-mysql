document.addEventListener("DOMContentLoaded", function () {
    // Obter o parâmetro da URL que contém a mensagem de sucesso ou erro
    const urlParams = new URLSearchParams(window.location.search);
    const msg = urlParams.get('msg'); // "msg" será o parâmetro que passamos na URL do PHP
    
    const messageDiv = document.getElementById('message');
    
    if (msg) {
        // Criar um elemento de mensagem
        const message = document.createElement('div');
        message.classList.add('alert');
        
        // Verificar o tipo de mensagem
        if (msg === 'sucesso') {
            message.classList.add('alert-success');
            message.textContent = 'Usuário registrado com sucesso! Você pode fazer login agora.';
        } else if (msg === 'senha_incorreta') {
            message.classList.add('alert-danger');
            message.textContent = 'As senhas não coincidem. Tente novamente.';
        } else if (msg === 'usuario_existente') {
            message.classList.add('alert-danger');
            message.textContent = 'Esse nome de usuário já existe. Escolha outro.';
        } else if (msg === 'erro') {
            message.classList.add('alert-danger');
            message.textContent = 'Houve um erro ao registrar o usuário. Tente novamente.';
        }
        
        // Adicionar a mensagem à página
        messageDiv.appendChild(message);
    }
});

document.addEventListener("DOMContentLoaded", function () {
    // Obter o parâmetro da URL que contém a mensagem de sucesso ou erro
    const urlParams = new URLSearchParams(window.location.search);
    const msg = urlParams.get('msg'); // "msg" será o parâmetro que passamos na URL do PHP
    
    const messageDiv = document.getElementById('message');
    
    if (msg === 'logout_sucesso') {
        // Criar um elemento de mensagem
        const message = document.createElement('div');
        message.classList.add('alert', 'alert-success');
        message.textContent = 'Logout realizado com sucesso!';
        
        // Adicionar a mensagem à página
        messageDiv.appendChild(message);
    }
});

document.addEventListener("DOMContentLoaded", function () {
    // Obter o parâmetro da URL que contém a mensagem de sucesso ou erro
    const urlParams = new URLSearchParams(window.location.search);
    const msg = urlParams.get('msg'); // "msg" será o parâmetro que passamos na URL do PHP
    
    const messageDiv = document.getElementById('message');
    
    if (msg === 'logout_sucesso') {
        // Criar um elemento de mensagem
        const message = document.createElement('div');
        message.classList.add('alert', 'alert-success');
        message.textContent = 'Logout realizado com sucesso!';
        
        // Adicionar a mensagem à página
        messageDiv.appendChild(message);
    } else if (msg === 'tarefa_adicionada') {
        const message = document.createElement('div');
        message.classList.add('alert', 'alert-success');
        message.textContent = 'Tarefa adicionada com sucesso!';
        messageDiv.appendChild(message);
    } else if (msg === 'erro_adicionar') {
        const message = document.createElement('div');
        message.classList.add('alert', 'alert-danger');
        message.textContent = 'Erro ao adicionar tarefa. Tente novamente!';
        messageDiv.appendChild(message);
    } else if (msg === 'erro_exclusao') {
        const message = document.createElement('div');
        message.classList.add('alert', 'alert-danger');
        message.textContent = 'Erro ao excluir tarefa. Tente novamente!';
        messageDiv.appendChild(message);
    } else if (msg === 'tarefa_excluida') {
        const message = document.createElement('div');
        message.classList.add('alert', 'alert-success');
        message.textContent = 'Tarefa excluída com sucesso!';
        messageDiv.appendChild(message);
    }
});
