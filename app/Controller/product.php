<?php
    class product extends DController{
        public function __construct()
        {
            parent::__construct();
            session_start();
        }
        public function index(){
            return $this->showproduct();
        }
        public function showproduct(){
            $productModel= $this->load->model('productModel');
            $productResult = $productModel->showAllProduct();

            /*
            This function show all productin database
            */
            $brandModel = $this->load->model('brandModel');
            $brandResult = $brandModel->showBrand();

            $categoryModel =$this->load->model('categoryModel');
            $categoryResult = $categoryModel->showCategory();
            return $this->load->view('ProductsPage', $productResult, $brandResult, NULL, $categoryResult);
            
        }
        public function showsearchproduct(){
            $productModel = $this->load->model('productModel');
            $searchProduct = $productModel->searchProduct($_SESSION['searchProduct']);
            if(empty($searchProduct)){
                echo "<script>
                    alert('Không tìm thấy sản phẩm!');
                </script>";
            }
            else{
                
                $brandModel = $this->load->model('brandModel');
                $brandResult = $brandModel->showBrand();
        
                $categoryModel =$this->load->model('categoryModel');
                $categoryResult = $categoryModel->showCategory();
        
                return $this->load->view('ProductsPage', $searchProduct, $brandResult, NULL, $categoryResult);
                
            }
        }
        public function showproductcondition(){
            /*
            We take input in View
            */
            if(isset($_POST['brand'])){
                $brand = $_POST['brand'];
            }
            if(isset($_POST['priceFrom'])){
                $priceFrom =$_POST['priceFrom'];
            }
            if(isset($_POST['priceTo'])){
                $priceTo =$_POST['priceTo'];
            }
            if(isset($_POST['priceSort'])){
                $priceSort= $_POST['priceSort'];
            }
            /*
            if user want show all product and sort product price ASC or DESC
            */
            
            if(empty($brand) && empty($priceFrom) && empty($priceTo) && ($priceSort=='DESC' || $priceSort=='ASC')){
                return $this->showProductPriceSortOnly($priceSort);
            }
            

            /*
            if user want show product base on price from to
            */

            elseif((!empty($priceFrom) || !empty($priceTo)) && empty($brand)){
            
                //                  We have 3 case
                // case 1: if user dont input priceFrom, just input priceTo
                // => priceFrom=0 in default
                if(empty($priceFrom) || $priceFrom=='0'){
                    if($priceSort!= NULL){
                        return $this->showproductpriceonly(0, $priceTo, $priceSort);
                    }
                    return $this->showproductpriceonly(0, $priceTo);
                }
                /*
                case 2: if user dont input priceTo, just priceFrom
                    => priceTo=0 in default
                */
                elseif(empty($priceTo)){
                    if($priceSort !=NULL){
                        return $this->showproductpriceonly($priceFrom, 0, $priceSort);
                    }
                    return $this->showproductpriceonly($priceFrom, 0);
                }
                /*
                case 3: we have both of priceFrom and priceTo
                */
                else{
                    if($priceSort !=NULL){
                        return $this->showproductpriceonly($priceFrom, $priceTo, $priceSort);
                    }
                    return $this->showproductpriceonly($priceFrom, $priceTo);
                }
            }



            elseif(!empty($brand) && empty($priceFrom) &&empty($priceTo)){
                if($priceSort== NULL){
                    return $this->showproductbrand($brand);
                }
                else{
                    return $this->showproductbrand($brand, $priceSort);
                }
            }

            
            elseif(!empty($brand) && (!empty($priceFrom)|| !empty($priceTo))){
                if(empty($priceFrom)){
                    if(empty($priceSort)){
                        return $this->showproduct_brand_price($brand, 0, $priceTo);
                    }
                    return $this->showproduct_brand_price($brand, 0, $priceTo, $priceSort);
                }
                elseif(empty($priceTo)){
                    if(empty($priceSort)){
                        return $this->showproduct_brand_price($brand, $priceFrom, 0);
                    }
                    return $this->showproduct_brand_price($brand, $priceFrom, 0, $priceSort);
                }
                else{
                    if(empty($priceSort)){
                        return $this->showproduct_brand_price($brand, $priceFrom, $priceTo);
                    }
                    return $this->showproduct_brand_price($brand, $priceFrom, $priceTo, $priceSort);
                }
            }
            
        }        
        public function showProductPriceSortOnly($condition){
            $productModel = $this->load->model('productModel');
            $result = $productModel->showAllProductPriceSort($condition);
            $result[0]['sort']= $condition;

            $brandModel = $this->load->model('brandModel');
            $brandDB = $brandModel->showBrand();
            
            $categoryModel =$this->load->model('categoryModel');
            $categoryResult = $categoryModel->showCategory();

            $this->load->view('ProductsPage', $result, $brandDB, NULL, $categoryResult);
        }

        public function showproductpriceonly($priceFrom, $priceTo, $priceSort=NULL){
            $productModel = $this->load->model('productModel');
            
            $result = $productModel->showProductPriceFromTo($priceFrom, $priceTo, $priceSort);
            $result[0]['priceFrom'] = $priceFrom;
            $result[0]['priceTo'] =$priceTo;
            $result[0]['sort']= $priceSort;

            $brandModel = $this->load->model('brandModel');
            $brandResult = $brandModel->showBrand();

            $categoryModel =$this->load->model('categoryModel');
            $categoryResult = $categoryModel->showCategory();

            $this->load->view('ProductsPage', $result, $brandResult, NULL, $categoryResult);
        }

        public function showproductbrand($brand, $priceSort=NULL){
            $productModel = $this->load->model('productModel');
            $productResult = $productModel->showProductBrand($brand, $priceSort);
            $productResult[0]['sort']=$priceSort;

            $brandModel = $this->load->model('brandModel');
            $brandDB = $brandModel->showBrand();

            $categoryModel =$this->load->model('categoryModel');
            $categoryResult = $categoryModel->showCategory();

            $this->load->view('ProductsPage', $productResult, $brandDB, $brand, $categoryResult);
        }

        public function showproduct_brand_price($brand, $priceFrom, $priceTo, $priceSort=NULL){
            $productModel = $this->load->model('productModel');
            $productResult = $productModel->showProduct_brand_price($brand, $priceFrom, $priceTo, $priceSort);
            $productResult[0]['sort']=$priceSort;
            $productResult[0]['priceFrom']=$priceFrom;
            $productResult[0]['priceTo']=$priceTo;


            $brandModel = $this->load->model('brandModel');
            $brandDB = $brandModel->showBrand();

            $categoryModel =$this->load->model('categoryModel');
            $categoryResult = $categoryModel->showCategory();

            $this->load->view('ProductsPage', $productResult, $brandDB, $brand, $categoryResult);

        }
        public function showproduct_category($categoryID){
            $productModel = $this->load->model('productModel');
            $productResult =$productModel->showProduct_category($categoryID);

            $brandModel = $this->load->model('brandModel');
            $brandDB = $brandModel->showBrand();

            $categoryModel =$this->load->model('categoryModel');
            $categoryResult = $categoryModel->showCategory();

            $this->load->view('ProductsPage', $productResult, $brandDB, NULL,$categoryResult );

        }
    }
?>