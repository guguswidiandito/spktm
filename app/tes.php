public function getMin1Attribute()
    {
        $min_1 = $this->min('ipk_smt_1');
        return $min_1;
    }

    public function getMin2Attribute()
    {
        $min_2 = $this->min('ipk_smt_2');
        return $min_2;
    }

    public function getMin3Attribute()
    {
        $min_3 = $this->min('ipk_smt_3');
        return $min_3;
    }

    public function getMin4Attribute()
    {
        $min_4 = $this->min('ipk_smt_4');
        return $min_4;
    }

    public function getMax1Attribute()
    {
        $max_1 = $this->max('ipk_smt_1');
        return $max_1;
    }

    public function getMax2Attribute()
    {
        $max_2 = $this->max('ipk_smt_2');
        return $max_2;
    }

    public function getMax3Attribute()
    {
        $max_3 = $this->max('ipk_smt_3');
        return $max_3;
    }

    public function getMax4Attribute()
    {
        $max_4 = $this->max('ipk_smt_4');
        return $max_4;
    }

    public function getMean1Attribute()
    {
        $x      = $this->sum('ipk_smt_1');
        $y      = $this->count();
        $mean_1 = $x / $y;
        return $mean_1;
    }

    public function getMean2Attribute()
    {
        $x      = $this->sum('ipk_smt_2');
        $y      = $this->count();
        $mean_2 = $x / $y;
        return $mean_2;
    }

    public function getMean3Attribute()
    {
        $x      = $this->sum('ipk_smt_3');
        $y      = $this->count();
        $mean_3 = $x / $y;
        return $mean_3;
    }

    public function getMean4Attribute()
    {
        $x      = $this->sum('ipk_smt_4');
        $y      = $this->count();
        $mean_4 = $x / $y;
        return $mean_4;
    }

    public function getStd1Attribute()
    {
        $sigmax    = $this->count();
        $mahasiswa = \DB::select('SELECT SUM(ipk_smt_1*ipk_smt_1) AS total FROM mahasiswas');
        foreach ($mahasiswa as $key => $value) {
            $sigmax2i = $value->total;
        }
        $x2       = $sigmax * $sigmax2i;
        $sigmaxi  = $this->sum('ipk_smt_1');
        $sigmaxi2 = $sigmaxi * $sigmaxi;
        $ni       = $sigmax * ($sigmax - 1);
        $varian   = ($x2 - $sigmaxi2) / $ni;
        $std_1    = sqrt($varian);
        return $std_1;

    }

    public function getStd2Attribute()
    {
        $sigmax    = $this->count();
        $mahasiswa = \DB::select('SELECT SUM(ipk_smt_2*ipk_smt_2) AS total FROM mahasiswas');
        foreach ($mahasiswa as $key => $value) {
            $sigmax2i = $value->total;
        }
        $x2       = $sigmax * $sigmax2i;
        $sigmaxi  = $this->sum('ipk_smt_2');
        $sigmaxi2 = $sigmaxi * $sigmaxi;
        $ni       = $sigmax * ($sigmax - 1);
        $varian   = ($x2 - $sigmaxi2) / $ni;
        $std_2    = sqrt($varian);
        return $std_2;

    }

    public function getStd3Attribute()
    {
        $sigmax    = $this->count();
        $mahasiswa = \DB::select('SELECT SUM(ipk_smt_3*ipk_smt_3) AS total FROM mahasiswas');
        foreach ($mahasiswa as $key => $value) {
            $sigmax2i = $value->total;
        }
        $x2       = $sigmax * $sigmax2i;
        $sigmaxi  = $this->sum('ipk_smt_3');
        $sigmaxi2 = $sigmaxi * $sigmaxi;
        $ni       = $sigmax * ($sigmax - 1);
        $varian   = ($x2 - $sigmaxi2) / $ni;
        $std_3    = sqrt($varian);
        return $std_3;

    }

    public function getStd4Attribute()
    {
        $sigmax    = $this->count();
        $mahasiswa = \DB::select('SELECT SUM(ipk_smt_4*ipk_smt_4) AS total FROM mahasiswas');
        foreach ($mahasiswa as $key => $value) {
            $sigmax2i = $value->total;
        }
        $x2       = $sigmax * $sigmax2i;
        $sigmaxi  = $this->sum('ipk_smt_4');
        $sigmaxi2 = $sigmaxi * $sigmaxi;
        $ni       = $sigmax * ($sigmax - 1);
        $varian   = ($x2 - $sigmaxi2) / $ni;
        $std_4    = sqrt($varian);
        return $std_4;

    }
