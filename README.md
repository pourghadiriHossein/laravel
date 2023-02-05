# Show All User on Private Side and Create Add User Mechanism

<ol>
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


