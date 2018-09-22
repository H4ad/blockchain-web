<section id="contact">
    <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-0">Contate-nos</h2>
        <hr class="star-dark mb-5">
        <div class="row">
        <div class="col-lg-8 mx-auto">
            <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
            <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
            <form method="POST" action="#contact">

            <!-- Token de segurança -->
            {{ csrf_field() }}


            <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Nome</label>
                <input class="form-control"
                       name="name"
                       type="text"
                       value="{{ old('name') }}"
                       maxlength="128"
                       placeholder="Nome"
                       required="required">
                <p class="help-block text-danger"></p>
                </div>
            </div>
            <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Endereço de e-mail</label>
                <input class="form-control"
                       name="email"
                       type="email"
                       value="{{ old('email') }}"
                       maxlength="128"
                       placeholder="Endereço de e-mail"
                       required="required">
                <p class="help-block text-danger"></p>
                </div>
            </div>
            <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Número de telefone</label>
                <input class="form-control"
                        name="telephone"
                        type="tel"
                        value="{{ old('telephone') }}"
                        maxlength="11"
                        placeholder="Número de telefone"
                        required="required">
                <p class="help-block text-danger"></p>
                </div>
            </div>
            <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Mensagem</label>
                <textarea class="form-control"
                          name="message"
                          value="{{ old('message') }}"
                          rows="5"
                          placeholder="Mensagem"
                          required="required"></textarea>
                <p class="help-block text-danger"></p>
                </div>
            </div>
            <br>
            <div id="success"></div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-xl">Enviar</button>
            </div>
            </form>

            @include ('layouts.errors')

        </div>
        </div>
    </div>
</section>