# CRUD Mechanism For Comment In laravel

## Create RCAction file then Write Starter Structure
```bash
<?php

namespace App\Actions;

class RCAction {
    //Query Part

    //Tools Part

    //Edit Part

    //necessary function

}
```
## Add two query in RCAction
- ### get all regions query
```bash
public static function getAllRegions(){
    $regions = Region::all();
    return $regions;
}
```
- ### get region query
```bash
public static function getRegion($region_id){
    $region = Region::find($region_id);
    return $region;
}
```
- ### get all cities query
```bash
public static function getAllCity(){
    $cities = City::all();
    return $cities;
}
```
- ### get city query
```bash
public static function getCity($city_id){
    $city = City::find($city_id);
    return $city;
}
```

## in PrivateController, Update visitRegion function
```bash
public function visitRegion() {
    $regions = RCAction::getAllRegions();
    return view('private.RC.visitRegion', compact('regions'));
}
```
## Update tbody tag  in visitRegion.blade.php File
```bash
@foreach ($regions as $region)
<tr>
    <td>{{ $region->id }}</td>
    <td>{{ $region->label }}</td>
    <td>
        @if ($region->status == 0)
        <p class="label label-danger">غیر فعال</p>
        @else
        <p class="label label-success">فعال</p>
        @endif
    </td>
    <td>
        <a class="label label-warning" href="{{ route('updateRegion',$region) }}">ویرایش</a>
        <a class="label label-info" href="{{ route('addCity',$region->id) }}">افزودن شهر +</a>
    </td>
</tr>
@endforeach
```
## Update form tag in addRegion.blade.php File
```bash
<form class="form-horizontal" action="{{ route('postAddRegion') }}" method="post" enctype="multipart/form-data">
    @csrf
    <fieldset title="اطلاعات پایه" class="step" id="default-step-0">
        <div class="form-group">
            <label class="col-lg-2 control-label">نام استان</label>
            <div class="col-lg-10">
                <input value="{{ old('label') }}" type="text" name="label" class="form-control" placeholder="نام استان">
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">وضعیت استان</label>
            <div class="col-lg-10">
                <select name="status" class="form-control" style="height: 40px">
                    <option value="0" selected>غیر فعال</option>
                    <option value="1">فعال</option>
                </select>
            </div>
        </div>
    </fieldset>
    <input type="submit" class="finish btn btn-danger" value="تایید"/>
</form>
```
## in RCAction, Write addRegion static function
```bash
public static function addRegion($request)
{
    $newRegion = new Region();
    $newRegion->label = $request->input('label');
    $newRegion->status = $request->input('status');
    $newRegion->save();
    return back();
}
```
## Create AddRegionRequest
- ### Command
```bash
php artisan make:request AddRegionRequest
```
- ### Update AddRegionRequest File
```bash
public function authorize()
{
    return true;
}
```
```bash
public function rules()
{
    return [
        'label' => 'required|min:3|max:100',
        'status' => 'digits_between:0,1',
    ];
}
```
## in PrivateController, Update postAddRegion function
```bash
public function postAddRegion(AddRegionRequest $request) {
    RCAction::addRegion($request);
    return redirect(route('visitRegion'));
}
```

## in PrivateController, Update updateRegion function
```bash
public function updateRegion(Region $region) {
    return view('private.RC.updateRegion', compact('region'));
}
```

## Update form tag in updateRegion.blade.php File
```bash
<form class="form-horizontal" action="{{ route('postUpdateRegion',$region->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    <fieldset title="اطلاعات پایه" class="step" id="default-step-0">
        <div class="form-group">
            <label class="col-lg-2 control-label">نام استان</label>
            <div class="col-lg-10">
                <input value="{{ $region->label }}" type="text" name="label" class="form-control" placeholder="نام استان">
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">وضعیت استان</label>
            <div class="col-lg-10">
                <select name="status" class="form-control" style="height: 40px">
                    <option value="0" @if($region->status == 0) selected @endif>غیر فعال</option>
                    <option value="1" @if($region->status == 1) selected @endif>فعال</option>
                </select>
            </div>
        </div>
    </fieldset>
    <input type="submit" class="finish btn btn-danger" value="تایید"/>
</form>
```
## in RCAction, Write updateRegion static function
```bash
public static function updateRegion($request, $region_id)
{
    $updateRegion = self::getRegion($region_id);
    $updateRegion->label = $request->input('label');
    $updateRegion->status = $request->input('status');
    $updateRegion->save();
    return back();
}
```
## Create UpdateRegionRequest
- ### Command
```bash
php artisan make:request UpdateRegionRequest
```
- ### Update UpdateRegionRequest File
```bash
public function authorize()
{
    return true;
}
```
```bash
public function rules()
{
    return [
        'label' => 'required|min:3|max:100',
        'status' => 'digits_between:0,1',
    ];
}
```
## in PrivateController, Update postUpdateRegion function
```bash
public function postUpdateRegion(UpdateRegionRequest $request, $region_id) {
    RCAction::updateRegion($request, $region_id);
    return redirect(route('visitRegion'));
}
```
################

## in PrivateController, Update visitCity function
```bash
public function visitCity() {
    $cities = RCAction::getAllCity();
    return view('private.RC.visitCity', compact('cities'));
}
```
## Update tbody tag  in visitCity.blade.php File
```bash
@foreach ($cities as $city)
<tr>
    <td>{{ $city->id }}</td>
    <td>{{ $city->label }}</td>
    <td>
        @if ($city->status == 0)
        <p class="label label-danger">غیر فعال</p>
        @else
        <p class="label label-success">فعال</p>
        @endif
    </td>
    <td>
        <a class="label label-warning" href="{{ route('updateCity',$city) }}">ویرایش</a>
    </td>
</tr>
@endforeach
```
## in PrivateController, Update addCity function
```bash
public function addCity($region_id) {
    return view('private.RC.addCity', compact('region_id'));
}
```
## Update form tag in addCity.blade.php File
```bash
<form class="form-horizontal" action="{{ route('postAddCity',$region_id) }}"method="post" enctype="multipart/form-data">
    @csrf
    <fieldset title="اطلاعات پایه" class="step" id="default-step-0">
        <div class="form-group">
            <label class="col-lg-2 control-label">نام شهر</label>
            <div class="col-lg-10">
                <input value="{{ old('label') }}" type="text" name="label" class="form-control" placeholder="نام شهر">
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">وضعیت شهر</label>
            <div class="col-lg-10">
                <select name="status" class="form-control" style="height: 40px">
                    <option value="0" selected>غیر فعال</option>
                    <option value="1">فعال</option>
                </select>
            </div>
        </div>

    </fieldset>
    <input type="submit" class="finish btn btn-danger" value="تایید"/>
</form>
```
## in RCAction, Write addCity static function
```bash
public static function addCity($request, $region_id)
{
    $newCity = new City();
    $newCity->region_id = $region_id;
    $newCity->label = $request->input('label');
    $newCity->status = $request->input('status');
    $newCity->save();
    return back();
}
```
## Create AddCityRequest
- ### Command
```bash
php artisan make:request AddCityRequest
```
- ### Update AddCityRequest File
```bash
public function authorize()
{
    return true;
}
```
```bash
public function rules()
{
    return [
        'label' => 'required|min:3|max:100',
        'status' => 'digits_between:0,1',
    ];
}
```
## in PrivateController, Update postAddCity function
```bash
public function postAddCity(AddCityRequest $request, $region_id) {
    RCAction::addCity($request, $region_id);
    return redirect(route('visitCity'));
}
```

## in PrivateController, Update updateCity function
```bash
public function updateCity(City $city) {
    return view('private.RC.updateCity', compact('city'));
}
```

## Update form tag in updateCity.blade.php File
```bash
<form class="form-horizontal" action="{{ route('postUpdateCity',$city->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    <fieldset title="اطلاعات پایه" class="step" id="default-step-0">
        <div class="form-group">
            <label class="col-lg-2 control-label">نام شهر</label>
            <div class="col-lg-10">
                <input value="{{ $city->label }}" type="text" name="label" class="form-control" placeholder="نام شهر">
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">وضعیت شهر</label>
            <div class="col-lg-10">
                <select name="status" class="form-control" style="height: 40px">
                    <option value="0" @if($city->status == 0) selected @endif>غیر فعال</option>
                    <option value="1" @if($city->status == 1) selected @endif>فعال</option>
                </select>
            </div>
        </div>

    </fieldset>
    <input type="submit" class="finish btn btn-danger" value="تایید"/>
</form>
```
## in RCAction, Write updateCity static function
```bash
public static function updateCity($request, $city_id)
{
    $updateCity = self::getCity($city_id);
    $updateCity->label = $request->input('label');
    $updateCity->status = $request->input('status');
    $updateCity->save();
    return back();
}
```
## Create UpdateCityRequest
- ### Command
```bash
php artisan make:request UpdateCityRequest
```
- ### Update UpdateCityRequest File
```bash
public function authorize()
{
    return true;
}
```
```bash
public function rules()
{
    return [
        'label' => 'required|min:3|max:100',
        'status' => 'digits_between:0,1',
    ];
}
```
## in PrivateController, Update postUpdateCity function
```bash
public function postUpdateCity(UpdateCityRequest $request, $city_id) {
    RCAction::updateCity($request, $city_id);
    return redirect(route('visitCity'));
}
```
