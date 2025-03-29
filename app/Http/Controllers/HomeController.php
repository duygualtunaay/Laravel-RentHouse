<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Faq;
use App\Models\House;
use App\Models\Image;
use App\Models\Message;
use App\Models\Review;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public static function categoryList()
    {
        return Category::where('parent_id', 0)->with('children')->get();
    }

    public static function getSetting()
    {
        return Setting::first();
    }

    public function index()
    {
        $setting = self::getSetting();
        $slider = House::select('id', 'title', 'image', 'slug', 'category_id', 'metrekare', 'phone', 'odasayisi', 'address', 'price')
            ->where('status', 'True')->limit(6)->get();
        $daily = House::select('id', 'title', 'image', 'slug', 'category_id')
            ->where('status', 'True')->inRandomOrder()->limit(4)->get();
        $last = House::select('id', 'title', 'image', 'slug', 'price', 'category_id')
            ->where('status', 'True')->orderByDesc('id')->limit(4)->get();
        $picked = House::select('id', 'title', 'image', 'slug', 'price', 'category_id')
            ->where('status', 'True')->inRandomOrder()->limit(4)->get();

        return view('home.index', compact('setting', 'daily', 'last', 'picked', 'slider'));
    }

    public function getHouse(Request $request)
    {
        $search = $request->input('search');
        $house = House::where('title', 'like', "%$search%")
            ->first();

        if ($house) {
            return redirect()->route('house', ['id' => $house->id, 'slug' => $house->slug]);
        }
        return redirect()->route('houselist', ['search' => $search]);
    }

    public function houseList($search)
    {
        $datalist = House::where('title', 'like', "%$search%")
            ->get();
        return view('home.search_houses', compact('search', 'datalist'));
    }

    public function categoryHouses($id)
    {
        $setting = self::getSetting();
        $data = Category::findOrFail($id);
        $datalist = House::where('category_id', $id)->get();
        return view('home.category_houses', compact('data', 'datalist', 'setting'));
    }

    public function house($id)
    {
        $setting = self::getSetting();
        $data = House::findOrFail($id);
        $images = Image::where('house_id', $id)->get();
        $reviews = Review::where('house_id', $id)->get();
        return view('home.house_detail', compact('setting', 'data', 'images', 'reviews'));
    }

    public function sendReview(Request $request, $id, $slug)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'review' => 'required|string',
        ]);

        Review::create([
            'user_id' => Auth::id(),
            'house_id' => $id,
            'subject' => $request->subject,
            'review' => $request->review,
            'IP' => $request->ip(),
        ]);

        return redirect()->route('house', ['id' => $id,'slug'=>$slug])->with('success', 'Mesajınız kaydedilmiştir');
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Message::create($request->all());

        return redirect()->route('contact')->with('success', 'Mesajınız kaydedilmiştir');
    }

    public function aboutUs()
    {
        $setting = self::getSetting();
        return view('home.about', compact('setting'));
    }

    public function contact()
    {
        $setting = self::getSetting();
        return view('home.contact', compact('setting'));
    }

    public function references()
    {
        $setting = self::getSetting();
        return view('home.references', compact('setting'));
    }

    public function faq()
    {
        $setting = self::getSetting();
        $datalist = Faq::orderBy('position')->get();
        return view('home.faq', compact('datalist', 'setting'));
    }

    public function login()
    {
        return view('admin.login');
    }

    public function loginCheck(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('admin');
        }

        return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
