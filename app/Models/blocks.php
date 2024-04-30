<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Blocks extends Model
{
    use HasFactory;

    /**
     * ブロックしている側のユーザーを取得する
     */
    public function blockUser()
    {
        return User::find($this->block_user);
    }

    /**
     * ブロックされている側のユーザーを取得する
     */
    public function blockerUser()
    {
        return User::find($this->user);
    }

    /**
     * ブロックされている側のポストを非表示にする
     */
    public function post()
    {
        return User::find($this->user);
    }

    /**
     * ユーザーがブロックしているユーザーのリストを取得する
     */
    public function blockUsers()
    {
        $blockUsers = Block::where('user', $this->id)->get();
        $result = [];
        foreach ($blockUsers as $blockUser) {
            array_push($result, $blockUser->blockUser());
        }
        return $result;
    }

     /**
     * ユーザーがブロックされているユーザーのリストを取得する
     */
    public function blockerUsers()
    {
        $blockerUsers = Block::where('user', $this->id)->get();
        $result = [];
        foreach ($blockerUsers as $blockerUser) {
            array_push($result, $blockerUser->blockerUser());
        }
        return $result;
    }

 /**
     * $idのユーザーをブロックする
     */
    public function block($id)
    {
        $block = new Block;
        $block->user = $this->id;
        $block->block_user = $id;
        $block->save();
    }

    /**
     * $idのユーザーをブロック解除する
     */
    public function unblock($id)
    {
        Block::where('user', $this->id)
            ->where('block_user', $id)
            ->first()
            ->delete();
    }
}