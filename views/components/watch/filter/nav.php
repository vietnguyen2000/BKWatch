<style>
  .dropbtn-watchPage {
    background-color: #4caf50;
    color: white;
    /* padding: 16px;
    font-size: 16px; */
    width: 100%;
    border: none;
    cursor: pointer;
  }

  .dropdown {
    position: relative;
    display: inline-block;
    width: 100%;
  }

  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    width: 100%;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
  }

  .dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
  }

  .dropdown-content a:hover {
    background-color: #f1f1f1;
  }

  .dropdown:hover .dropdown-content {
    display: block;
  }

  .dropdown:hover .dropbtn {
    background-color: #3e8e41;
  }
</style>
<div class="dropdown">
  <button class="dropbtn-watchPage">Dropdown</button>
  <div class="dropdown-content">
    <a href="#">Link 1</a>
    <a href="#">Link 2</a>
    <a href="#">Link 3</a>
  </div>
</div>