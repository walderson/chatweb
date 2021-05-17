<?php include_once "head.php" ?>
<body>
    <div class="wrapper">
        <section class="form login">
            <header>Chat@Web</header>
            <form action="#">
                <div class="error-text"></div>
                <div class="field input">
                    <label>e-mail</label>
                    <input type="email" name="email" placeholder="Informe seu e-mail">
                </div>
                <div class="field input">
                    <label>Senha</label>
                    <input type="password" name="password" placeholder="Informe sua senha">
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field button">
                    <input type="submit" value="Continuar para o chat">
                </div>
            </form>
            <div class="link">Não está cadastrado? <a href="index.php">Cadastrar agora</a></div>
        </section>
    </div>

    <script src="js/login.js"></script>
    <script src="js/pass-show-hide.js"></script>
</body>
</html>