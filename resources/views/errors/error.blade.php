<style>
    .row{
        text-align:center;
    }
    .error_number {
        margin-top:10%; 
      font-size: 100px;
      font-weight: 200;
      line-height: 100px;
      color:red;
    }
    .error_number small {
      font-size: 56px;
      font-weight: 700;
    }

    .error_number hr {
      margin-top: 60px;
      margin-bottom: 0;
      width: 50px;
    }

    .error_title {
      margin-top: 40px;
      font-size: 36px;
      font-weight: 400;
    }

    .error_description {
      font-size: 24px;
      font-weight: 400;
    }
  </style>
<div class="row">
    <div class="col-md-12 text-center">
      <div class="error_number">
          Compte désactivé
        <hr>
      </div>
      <div class="error_title text-muted">
        {{ $user->email}}  votre compte a été désactivé
      </div>
      <div class="error_description text-muted">
         <small>
          Merci de contacter le responsable pédagogique à l'adresse  <a href="mailto:admin.@webschool.com">supervisor@webschool.com</a> 
       </small>
      </div>
      <div class="error_title text-muted">
       <a href="/">connectez-vous</a>
      </div>
    </div>
  </div>