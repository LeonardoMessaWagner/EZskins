<script>
    import { ajUsers } from "./users.js";
    import User from "./User.svelte";
    let frmSaveUser;
    let txtUserName;
    let txtUserLastName;
    let from = 0;
    const saveUser = async () => {
        let con = await fetch(`http://localhost/back/api-create-user.php`, {
            method: "POST",
            body: new FormData(frmSaveUser),
        });
        let res = await con.json();
        $ajUsers = [...res, ...$ajUsers];
        txtUserName.value = "";
        txtUserName.focus();
        txtUserLastName.value = "";
    };
    const getMoreUsers = async () => {
        let connection = await fetch(
            `http://localhost/back/api-get-from-to-users.php?from=${from}`
        );
        let res = await connection.json();
        from += 2;
        for (let i = 0; i < $ajUsers.length; i++) {
            for (let y = 0; y < res.length; y++) {
                if ($ajUsers[i]._key == res[y]._key) {
                    res = res.splice(i, 1);
                }
            }
        }
        $ajUsers = [...res.reverse(), ...$ajUsers];
    };
    getMoreUsers();
</script>

<section>
    <form
        bind:this={frmSaveUser}
        on:submit|preventDefault={saveUser}
        autocomplete="off"
    >
        <div class="form-group col-md-12">
            <input
                bind:this={txtUserName}
                name="name"
                type="text"
                value=""
                placeholder="Nome"
            />
            <input
                bind:this={txtUserLastName}
                name="lastName"
                type="text"
                value=""
                placeholder="Sobrenome"
            />
        </div>
        <div class="form-group col-md-12">

        </div> 

        <button id="btnSave" class="btn btn-primary">Concluir</button>
    </form>

    <!-- <button id="btnMoreUsers" on:click={getMoreUsers}>
      Show more users
    </button> -->
</section>

<div id="users">
    {#each $ajUsers as jUser (jUser._key)}
        <User {jUser} />
    {/each}
</div>

<div>
    <!-- {JSON.stringify($ajUsers)} -->
</div>

<style>
</style>
