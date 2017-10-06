@extends('layouts.main')
@section('content')

 <div class="mdl-cell mdl-cell--12-col mdl-card mdl-shadow--4dp">
                   <!-- <div class="mdl-card__title">
                        <h2 class="mdl-card__title-text">Contact</h2>
                    </div>-->
                    <div class="mdl-card__media">
   <div class="bread">     
  <nav>
    <div class="nav-wrapper">
      <div class="col s12">
        <a href="#!" class="breadcrumb">First</a>
        <a href="#!" class="breadcrumb">Second</a>
        <a href="#!" class="breadcrumb">Third</a>
      </div>
    </div>
  </nav>
          </div>
                    </div>
                    <div class="mdl-card__supporting-text">
                     <!--   
                        <p>
                            Enim labore aliqua consequat ut quis ad occaecat aliquip incididunt. Sunt nulla eu enim irure enim nostrud aliqua consectetur ad consectetur sunt ullamco officia. Ex officia laborum et consequat duis.
                        </p>
                        <p>
                            Excepteur reprehenderit sint exercitation ipsum consequat qui sit id velit elit. Velit anim eiusmod labore sit amet.
                        </p>-->
                     
                        
  <div class="row">
               
            <div class="row">
    <div class="input-field col s6">
      <input value="Alvin" id="first_name2" type="text" class="validate">
      <label class="active" for="first_name2">First Name</label>
    </div>
                    <div class="input-field col s6">
      <input value="Alvin" id="first_name2" type="text" class="validate">
      <label class="active" for="first_name2">First Name</label>
    </div>
  </div>    
                     <div class="row">
    <div class="input-field col s6">
      <input value="Alvin" id="first_name2" type="text" class="validate">
      <label class="active" for="first_name2">First Name</label>
    </div>
                    <div class="input-field col s6">
      <input value="Alvin" id="first_name2" type="text" class="validate">
      <label class="active" for="first_name2">First Name</label>
    </div>
  </div>  
                     <div class="row">
    <div class="input-field col s6">
      <input value="Alvin" id="first_name2" type="text" class="validate">
      <label class="active" for="first_name2">First Name</label>
    </div>
                    <div class="input-field col s6">
      <input value="Alvin" id="first_name2" type="text" class="validate">
      <label class="active" for="first_name2">First Name</label>
    </div>
  </div>  
                     <div class="row">
                          <div class="input-field col s6">
                     
  <select class="browser-default">
    <option value="" disabled selected>Choose your option</option>
    <option value="1">Option 1</option>
    <option value="2">Option 2</option>
    <option value="3">Option 3</option>
  </select>
                          </div>
                     </div>
    <form class="col s12">
      <div class="row">
             <div class="input-field mdl-textfield mdl-js-textfield mdl-textfield--floating-label s12 col">
                                <input class="mdl-textfield__input" type="text" id="Email">
                                <label class="mdl-textfield__label" for="Email">Email...</label>
                            </div>
        <div class="input-field col s6">
          <input id="last_name" type="text" class="validate">
          <label for="last_name">Last Name</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input disabled value="I am not editable" id="disabled" type="text" class="validate">
          <label for="disabled">Disabled</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="password" type="password" class="validate">
          <label for="password">Password</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="email" type="email" class="validate">
          <label for="email">Email</label>
        </div>
      </div>
      <div class="row">
        <div class="col s12">
          This is an inline input field:
          <div class="input-field inline">
            <input id="email" type="email" class="validate">
            <label for="email" data-error="wrong" data-success="right">Email</label>
          </div>
        </div>
      </div>
    </form>
  </div>
        
                        <div id="striped" class="section scrollspy">
        <h2 class="header">Striped Table</h2>
        <div class="row">
          <div class="col s12">
            <p>Add <code class="language-markup">class="striped"</code> to the table tag for a striped table</p>
            <table class="bordered" style="width: 100%">
              <thead>
                <tr>
                    <th data-field="id">Name</th>
                    <th data-field="name">Item Name</th>
                    <th data-field="price">Item Price</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Alvin</td>
                  <td>Eclair</td>
                  <td>$0.87</td>
                </tr>
                <tr>
                  <td>Alan</td>
                  <td>Jellybean</td>
                  <td>$3.76</td>
                </tr>
                <tr>
                  <td>Jonathan</td>
                  <td>Lollipop</td>
                  <td>$7.00</td>
                </tr>
                <tr>
                  <td>Shannon</td>
                  <td>KitKat</td>
                  <td>$9.99</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
                    </div>
                         
                </div>
@endsection