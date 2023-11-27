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

// �摜���i�[����I�u�W�F�N�g��錾���ĉ摜��ǂݍ���
	cv::Mat	image;
	image = cv::imread(argv[1]);

	//�G���[����
	if (image.empty() == true) {

		cout << "�摜�̒��g����ł��B" << endl;

		// �摜�̒��g����Ȃ�I������

		return 0;
	}

	// �E�B���h�E�ɉ摜��\������
	cv::imshow("�摜", image);

	// �L�[���������܂ő҂�
	cv::waitKey(0);

	//  �摜�������o��
	cv::imwrite("output.jpg", image);

	cout << "Hello world." << endl;

	return 0;
}