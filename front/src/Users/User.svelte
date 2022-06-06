<script>
    import {ajUsers} from "./users.js"
    import { fade } from "svelte/transition"
    export let jUser
    let frmUser
    let txtUserName
    let txtUserLastName
    
    let sUserState
    $:btnDeleteCaption = ( sUserState == "deleting" ? "Undo" : "Delete" )
    $:userBgColor = ( sUserState == "deleting" ? "rgba(247, 51, 120, 0.4)" : "white" )
    $:btnUpdateUserOpacity = (sUserState == "updating" ? "1" : "0.3" )
    let timerDeleteUser
    let timerUpdateUser
    const deleteUser = async () => {    
      if(btnDeleteCaption == "Delete"){
        sUserState = "deleting"
        timerDeleteUser = setTimeout( async () =>{
          $ajUsers = $ajUsers.filter( u => u._key != jUser._key )
          let form = new FormData()
          form.append("_key", jUser._key)
          let con = await fetch("http://localhost/back/api-delete-user.php",{
            method: "POST",
            body: form
          })
          let res = await con.json()
          console.log(res)
        }, 2000)
        return
      }
      sUserState = ""
      clearTimeout(timerDeleteUser)
    }
    const updateUser = () => {
      if( txtUserName.value != jUser.name || txtUserLastName.value != jUser.lastName ){
        sUserState = "updating"      
        timerUpdateUser = setTimeout( saveUser, 2000 )
        return
      }     
      sUserState = ""    
    }
    const saveUser = async () => {    
      if( txtUserName.value == jUser.name && txtUserLastName.value == jUser.lastName){
        return
      }
      clearTimeout(timerUpdateUser)
      sUserState = ""
      let form = new FormData()
      if( txtUserName.value != jUser.name ){       
        form.append("name", txtUserName.value) 
      }
      if( txtUserLastName.value != jUser.lastName ){       
        form.append("lastName", txtUserLastName.value) 
      }    
      let con = await fetch("http://localhost/back/api-update-user.php", {
        method : "POST",
        body : new FormData(frmUser)
      })
      let res = await con.text()
      jUser.name = txtUserName.value
      jUser.lastName = txtUserLastName.value
    }
  </script>
  
  <div class="user" style="background-color:{userBgColor}" transition:fade>
    <form bind:this={frmUser} on:submit|preventDefault={saveUser} autocomplete="off">
      <input name="_key" type="text" value={jUser._key} hidden>
      <input name="name" bind:this={txtUserName} type="text" value= {jUser.name} on:input={updateUser}>
      <input name="lastName" bind:this={txtUserLastName} type="text" value= {jUser.lastName} on:input={updateUser}>
      <button id="btnSave" style="opacity:{btnUpdateUserOpacity}">💾</button>
    </form>
    <button id="btnDelete" on:click={deleteUser}>{btnDeleteCaption}</button>
  </div>
  
  
  <style>
    .user{
      display: grid;
      grid-template-columns: 10fr 2fr;
      grid-gap: 0.5rem;
      align-items: center;
      padding: 0.5rem 1rem;
    }
    form{
      display: grid;
      grid-template-columns: 10fr 10fr 10fr;
      grid-gap: 0.2rem;
    }
    #btnSave{
      background: rgba(163,240,79, 0.1);
      border: none;
      border-radius: 0.5rem;
    }
    #btnDelete{
      border: none;
      outline: none;
      color: white;
      background: rgba(247, 51, 120, 0.7);
      border-radius: 0.5rem;
    }
  </style>