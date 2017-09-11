<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $fillable = ['nim', 'user_id', 'asal_sekolah', 'jenis_kelamin', 'ipk_smt_1', 'ipk_smt_2', 'ipk_smt_3', 'ipk_smt_4', 'ipk_smt_5', 'ipk_smt_6', 'tgl_kelulusan', 'angkatan'];

    protected $guarded = array('id');

    protected $appends = ['target'];

    public function setIpkSmt3Attribute($ipk3)
    {
        $this->attributes['ipk_smt_3'] = trim($ipk3) !== '' ? $ipk3 : '0.00';
    }

    public function setIpkSmt4Attribute($ipk4)
    {
        $this->attributes['ipk_smt_4'] = trim($ipk4) !== '' ? $ipk4 : '0.00';
    }

    public function setIpkSmt5Attribute($ipk5)
    {
        $this->attributes['ipk_smt_5'] = trim($ipk5) !== '' ? $ipk5 : '0.00';
    }

    public function setIpkSmt6Attribute($ipk6)
    {
        $this->attributes['ipk_smt_6'] = trim($ipk6) !== '' ? $ipk6 : '0.00';
    }

    public function setTglKelulusanAttribute($tglk)
    {
        $this->attributes['tgl_kelulusan'] = trim($tglk) !== '' ? $tglk : null;
    }

    public function getTargetAttribute($t)
    {
        if ($this->tgl_kelulusan == null) {
            return 'belum aktual';
        } else {
            $t = \Carbon\Carbon::parse($this->attributes['tgl_kelulusan'])->format('Y');
            $r = $t - $this->angkatan;
            if ($r > 4) {
                return 'tidak lulus tepat waktu';
            } else {
                return 'lulus tepat waktu';
            }
        }
    }

    public function getTotalAttribute()
    {
        return $this->whereIn('angkatan', ['2012', '2011', '2010'])->count();

    }

    public function getPrediksi12Attribute()
    {
        if (($this->ipk_smt_2 <= 2.3725) and ($this->ipk_smt_2 >= 0)) {
            return 'lulus tepat waktu';
        } elseif (($this->ipk_smt_2 <= 2.855) and ($this->ipk_smt_2 > 2.3725)) {
            if (($this->ipk_smt_1 <= 2.3375) and ($this->ipk_smt_1 >= 0)) {
                return 'tidak lulus tepat waktu';
            } elseif (($this->ipk_smt_1 <= 2.845) and ($this->ipk_smt_1 > 2.3375)) {
                return 'lulus tepat waktu';
            } elseif (($this->ipk_smt_1 <= 3.3525) and ($this->ipk_smt_1 > 2.845)) {
                return 'tidak lulus tepat waktu';
            } elseif (($this->ipk_smt_1 <= 4) and ($this->ipk_smt_1 > 3.3525)) {
                return 'lulus tepat waktu';
            }
        } elseif (($this->ipk_smt_2 <= 3.3375) and ($this->ipk_smt_2 > 2.855)) {
            return 'lulus tepat waktu';
        } elseif (($this->ipk_smt_2 <= 4) and ($this->ipk_smt_2 > 3.335)) {
            return 'lulus tepat waktu';
        }
    }

    public function getPrediksi14Attribute()
    {
        if (($this->ipk_smt_2 <= 2.3725) and ($this->ipk_smt_2 >= 0)) {
            return 'lulus tepat waktu';
        } elseif (($this->ipk_smt_2 <= 2.855) and ($this->ipk_smt_2 > 2.3725)) {
            if (($this->ipk_smt_3 <= 2.6175) and ($this->ipk_smt_3 >= 0)) {
                return 'lulus tepat waktu';
            } elseif (($this->ipk_smt_3 <= 3.025) and ($this->ipk_smt_3 > 2.6175)) {
                return 'lulus tepat waktu';
            } elseif (($this->ipk_smt_3 <= 3.4325) and ($this->ipk_smt_3 > 3.025)) {
                return 'tidak lulus tepat waktu';
            } elseif (($this->ipk_smt_3 <= 4) and ($this->ipk_smt_3 > 3.4325)) {
                return 'lulus tepat waktu';
            }
        } elseif (($this->ipk_smt_2 <= 3.3375) and ($this->ipk_smt_2 > 2.855)) {
            if (($this->ipk_smt_1 <= 2.3375) and ($this->ipk_smt_1 >= 0)) {
                return 'lulus tepat waktu';
            } elseif (($this->ipk_smt_1 <= 2.845) and ($this->ipk_smt_1 > 2.3375)) {
                return 'lulus tepat waktu';
            } elseif (($this->ipk_smt_1 <= 3.3525) and ($this->ipk_smt_1 > 2.845)) {
                if (($this->ipk_smt_4 <= 2.7215) and ($this->ipk_smt_4 >= 0)) {
                    return 'lulus tepat waktu';
                } elseif (($this->ipk_smt_4 <= 3.085) and ($this->ipk_smt_4 > 2.7215)) {
                    return 'lulus tepat waktu';
                } elseif (($this->ipk_smt_4 <= 3.4575) and ($this->ipk_smt_4 > 3.085)) {
                    return 'lulus tepat waktu';
                } elseif (($this->ipk_smt_4 <= 4) and ($this->ipk_smt_4 > 3.4575)) {
                    return 'tidak lulus tepat waktu';
                }
            } elseif (($this->ipk_smt_1 <= 4) and ($this->ipk_smt_1 > 3.3525)) {
                return 'lulus tepat waktu';
            }
        } elseif (($this->ipk_smt_2 <= 4) and ($this->ipk_smt_2 > 3.335)) {
            return 'lulus tepat waktu';
        }
    }

    public function getPrediksi13Attribute()
    {
        if (($this->ipk_smt_2 <= 2.3725) and ($this->ipk_smt_2 >= 0)) {
            return 'lulus tepat waktu';
        } elseif (($this->ipk_smt_2 <= 2.855) and ($this->ipk_smt_2 > 2.3725)) {
            if (($this->ipk_smt_3 <= 2.6175) and ($this->ipk_smt_3 >= 0)) {
                return 'lulus tepat waktu';
            } elseif (($this->ipk_smt_3 <= 3.025) and ($this->ipk_smt_3 > 2.6175)) {
                return 'lulus tepat waktu';
            } elseif (($this->ipk_smt_3 <= 3.4325) and ($this->ipk_smt_3 > 3.025)) {
                return 'tidak lulus tepat waktu';
            } elseif (($this->ipk_smt_3 <= 4) and ($this->ipk_smt_3 > 3.4325)) {
                return 'lulus tepat waktu';
            }
        } elseif (($this->ipk_smt_2 <= 3.3375) and ($this->ipk_smt_2 > 2.855)) {
            return 'lulus tepat waktu';
        } elseif (($this->ipk_smt_2 <= 4) and ($this->ipk_smt_2 > 3.335)) {
            return 'lulus tepat waktu';
        }
    }

    public function getPrediksi16Attribute()
    {
        if (($this->ipk_smt_2 <= 2.3725) and ($this->ipk_smt_2 >= 0)) {
            return 'lulus tepat waktu';
        } elseif (($this->ipk_smt_2 <= 2.855) and ($this->ipk_smt_2 > 2.3725)) {
            if (($this->ipk_smt_3 <= 2.6175) and ($this->ipk_smt_3 >= 0)) {
                return 'lulus tepat waktu';
            } elseif (($this->ipk_smt_3 <= 3.025) and ($this->ipk_smt_3 > 2.6175)) {
                return 'lulus tepat waktu';
            } elseif (($this->ipk_smt_3 <= 3.4325) and ($this->ipk_smt_3 > 3.025)) {
                return 'tidak lulus tepat waktu';
            } elseif (($this->ipk_smt_3 <= 4) and ($this->ipk_smt_3 > 3.4325)) {
                return 'lulus tepat waktu';
            }
        } elseif (($this->ipk_smt_2 <= 3.3375) and ($this->ipk_smt_2 > 2.855)) {
            if (($this->ipk_smt_6 <= 2.725) and ($this->ipk_smt_6 >= 0)) {
                if (($this->ipk_smt_4 <= 2.7215) and ($this->ipk_smt_4 >= 0)) {
                    return 'lulus tepat waktu';
                } elseif (($this->ipk_smt_4 <= 3.085) and ($this->ipk_smt_4 > 2.7215)) {
                    return 'tidak lulus tepat waktu';
                } elseif (($this->ipk_smt_4 <= 3.4575) and ($this->ipk_smt_4 > 3.085)) {
                    return 'lulus tepat waktu';
                } elseif (($this->ipk_smt_4 <= 4) and ($this->ipk_smt_4 > 3.4575)) {
                    return 'lulus tepat waktu';
                }
            } elseif (($this->ipk_smt_6 <= 3.05) and ($this->ipk_smt_6 > 2.725)) {
                return 'lulus tepat waktu';
            } elseif (($this->ipk_smt_6 <= 3.375) and ($this->ipk_smt_6 > 3.05)) {
                return 'lulus tepat waktu';
            } elseif (($this->ipk_smt_6 <= 4) and ($this->ipk_smt_6 > 3.375)) {
                return 'lulus tepat waktu';
            }
        } elseif (($this->ipk_smt_2 <= 4) and ($this->ipk_smt_2 > 3.335)) {
            return 'lulus tepat waktu';
        }
    }

}
