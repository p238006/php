#include <iostream>
#include <opencv2/opencv.hpp>

#ifdef _DEBUG
#pragma comment(lib,"opencv_world460d.lib")
#else
#pragma comment(lib,"opencv_world460d.lib")
#endif

using namespace std;

int main(int argc, char *argv[])
{
	for (int i = 0; i < argc; i++)
		cout << argv[i] << endl;

// 画像を格納するオブジェクトを宣言して画像を読み込む
	cv::Mat	image;
	image = cv::imread(argv[1]);

	//エラー処理
	if (image.empty() == true) {

		cout << "画像の中身が空です。" << endl;

		// 画像の中身が空なら終了する

		return 0;
	}

	// ウィンドウに画像を表示する
	cv::imshow("画像", image);

	// キーが押されるまで待つ
	cv::waitKey(0);

	//  画像を書き出し
	cv::imwrite("output.jpg", image);

	cout << "Hello world." << endl;

	return 0;
}