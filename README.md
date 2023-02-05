# Show All User on Private Side and Create Add User Mechanism

<ol>
<br><li>Create Actions Folder in App Folder</li>
<br><li>Create UserAction file then Write Starter Structure
<pre>

    <?php

    namespace App\Actions;

    class UserAction {
        //Query Part

        //Tools Part

        //Edit Part

        //necessary function

    }
</pre>
</li>
<br><li>Visit User Part
    <ol>
        <br><li>Write Query All For User
    <pre>
    public static function getAllUser(){
        $users = User::all();
        return $users;
    }
    </pre>
        </li>
        <br><li>Write Visit Public Function in PrivateContrller
    <pre>
    public function visitUser() {
        $users = UserAction::getAllUser();
        return view('private.user.visitUser', compact('users'));
    }
    </pre>
        </li>
        <br><li>Write Visit Public Function in PrivateContrller
    <pre>
    public function visitUser() {
        $users = UserAction::getAllUser();
        return view('private.user.visitUser', compact('users'));
    }
    </pre>
        </li>
    </ol>
</li>
<br><li>Create UserSeeder</li>
<br><li>Create UserSeeder
<pre>

    Role::create([
        'name' => 'admin', 'guard_name' => 'web'
    ]);
    Role::create([
        'name' => 'user', 'guard_name' => 'web'
    ]);
    $user = User::create([
        'name' => 'حسین پورقدیری',
        'phone' => '09398932183',
        'email' => 'hossein.654321@yahoo.com',
        'status' => 1,
        'password' => Hash::make('123456')
    ]);
    $user->syncRoles(Role::findByName('admin'));
</pre>
</li>
</ol>


